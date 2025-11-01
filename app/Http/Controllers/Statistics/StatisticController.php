<?php

namespace App\Http\Controllers\Statistics;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\District;
use App\Models\Neighborhood;
use App\Models\Region;
use App\Models\Response;
use App\Models\TestCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * 1️⃣ Umumiy raqamlar
     */
    public function overview()
    {
        return response()->json([
            'total_users' => User::count(),
            'total_companies' => Company::count(),
            'total_regions' => Region::count(),
            'total_districts' => District::count(),
            'total_neighborhoods' => Neighborhood::count(),
            'total_categories' => TestCategory::count(),
            'total_responses' => Response::count(),
            'avg_score' => round(Response::avg('total_score'), 2),
            'today_tests' => Response::whereDate('created_at', today())->count(),
        ]);
    }

    /**
     * 2️⃣ Region bo‘yicha tahlil
     */
    public function byRegion()
    {
        $regions = Region::with(['districts.neighborhoods.companies.profiles.user.responses'])->get();

        $data = $regions->map(function ($region) {
            $users = $region->districts
                ->flatMap(fn($d) => $d->neighborhoods
                    ->flatMap(fn($n) => $n->companies
                        ->flatMap(fn($c) => $c->profiles)));

            $responses = $users->flatMap(fn($u) => $u->user->responses);

            return [
                'region' => $region->name,
                'user_count' => $users->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score'), 2),
                'max_score' => $responses->max('total_score'),
            ];
        });

        return response()->json($data);
    }

    /**
     * 3️⃣ District bo‘yicha tahlil
     */
    public function byDistrict()
    {
        $districts = District::with(['neighborhoods.companies.profiles.user.responses'])->get();

        $data = $districts->map(function ($district) {
            $users = $district->neighborhoods
                ->flatMap(fn($n) => $n->companies->flatMap(fn($c) => $c->profiles));
            $responses = $users->flatMap(fn($u) => $u->user->responses);

            return [
                'district' => $district->name,
                'user_count' => $users->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score'), 2),
            ];
        });

        return response()->json($data);
    }

    /**
     * 4️⃣ Kompaniya bo‘yicha tahlil
     */
    public function byCompany()
    {
        $companies = Company::with(['neighborhood.district.region', 'profiles.user.responses'])->get();

        $data = $companies->map(function ($company) {
            $responses = $company->profiles->flatMap(fn($u) => $u->user->responses);
            return [
                'company' => $company->name,
                'region' => $company->neighborhood->district->region->name ?? null,
                'user_count' => $company->profiles->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score'), 2),
                'max_score' => $responses->max('total_score'),
            ];
        });

        return response()->json($data);
    }

    /**
     * 6️⃣ Foydalanuvchi faoliyati
     */
    public function userActivity()
    {
        $users = User::withCount('responses')
            ->with(['profile.company', 'responses' => function ($q) {
                $q->select('user_id', DB::raw('AVG(total_score) as avg_score'), DB::raw('MAX(created_at) as last_test'))
                    ->groupBy('user_id');
            }])->get();

        $data = $users->map(function ($user) {
            $stats = $user->responses->first();
            return [
                'user' => $user->firstname .' '.$user->lastname,
                'company' => $user->profile->company->name ?? null,
                'test_count' => $user->responses_count,
                'avg_score' => round($stats->avg_score ?? 0, 2),
                'last_test_at' => $stats->last_test ?? null,
            ];
        });

        return response()->json($data);
    }

    /**
     * 7️⃣ Eng yuqori ball olganlar (leaderboard)
     */
    public function leaderboard()
    {
        $leaders = User::with('profile.company')
            ->withAvg('responses', 'total_score')
            ->orderByDesc('responses_avg_total_score')
            ->take(10)
            ->get();

        return response()->json($leaders->map(fn($u) => [
            'user' => $u->firstname.' '.$u->lastname,
            'company' => $u->profile->company->name ?? null,
            'average_score' => round($u->responses_avg_total_score, 2),
        ]));
    }

    /**
     * 8️⃣ Kunlik test statistikasi
     */
    public function dailyStats()
    {
        $data = Response::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total'),
            DB::raw('AVG(total_score) as avg_score')
        )
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        return response()->json($data);
    }

    /**
     * 🔟 Export uchun umumiy ma’lumot (Excel yoki PDF)
     */
    public function exportSummary()
    {
        $regions = Region::with(['districts.neighborhoods.companies.profiles.user.responses'])->get();

        $data = $regions->map(function ($region) {
            $users = $region->districts
                ->flatMap(fn($d) => $d->neighborhoods
                    ->flatMap(fn($n) => $n->companies
                        ->flatMap(fn($c) => $c->profiles)));

            $responses = $users->flatMap(fn($u) => $u->user->responses);

            return [
                'region' => $region->name,
                'user_count' => $users->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('score'), 2),
            ];
        });

        return response()->json($data);
    }
}
