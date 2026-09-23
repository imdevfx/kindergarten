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

    protected function applyLocationFilters($query, Request $request)
    {
        return $query->when($request->region_id, fn($q) => $q->where('region_id', $request->region_id))
            ->when($request->district_id, fn($q) => $q->where('district_id', $request->district_id))
            ->when($request->neighborhood_id, fn($q) => $q->where('neighborhood_id', $request->neighborhood_id))
            ->when($request->company_id, fn($q) => $q->where('company_id', $request->company_id));
    }


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
    public function byRegion(Request $request)
    {
        $regions = Region::query()
            ->when($request->region_id, fn($q) => $q->where('id', $request->region_id))
            ->get();

        $profiles = \App\Models\UserProfile::with('user.responses')
            ->when($request->region_id, fn($q) => $q->where('region_id', $request->region_id))
            ->get();

        $data = $regions->map(function ($region) use ($profiles) {
            $regionProfiles = $profiles->where('region_id', $region->id);
            $responses = $regionProfiles->flatMap(fn($p) => $p->user ? $p->user->responses : collect());

            return [
                'id' => $region->id,
                'region' => $region->name,
                'user_count' => $regionProfiles->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score') ?? 0, 2),
                'max_score' => $responses->max('total_score') ?? 0,
            ];
        });

        return response()->json($data);
    }

    /**
     * 3️⃣ District bo‘yicha tahlil
     */
    public function byDistrict(Request $request)
    {
        $districts = District::query()
            ->when($request->region_id, fn($q) => $q->where('region_id', $request->region_id))
            ->when($request->district_id, fn($q) => $q->where('id', $request->district_id))
            ->get();

        $profiles = \App\Models\UserProfile::with('user.responses')
            ->when($request->region_id, fn($q) => $q->where('region_id', $request->region_id))
            ->when($request->district_id, fn($q) => $q->where('district_id', $request->district_id))
            ->get();

        $data = $districts->map(function ($district) use ($profiles) {
            $districtProfiles = $profiles->where('district_id', $district->id);
            $responses = $districtProfiles->flatMap(fn($p) => $p->user ? $p->user->responses : collect());

            return [
                'id' => $district->id,
                'district' => $district->name,
                'user_count' => $districtProfiles->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score') ?? 0, 2),
            ];
        });

        return response()->json($data);
    }

    public function byNeighborhood(Request $request)
    {
        $neighborhoods = Neighborhood::query()
            ->when($request->district_id, fn($q) => $q->where('district_id', $request->district_id))
            ->when($request->neighborhood_id, fn($q) => $q->where('id', $request->neighborhood_id))
            ->with(['district.region'])
            ->get();

        $profiles = \App\Models\UserProfile::with(['user.responses', 'district.region'])
            ->when($request->district_id, fn($q) => $q->where('district_id', $request->district_id))
            ->when($request->neighborhood_id, fn($q) => $q->where('neighborhood_id', $request->neighborhood_id))
            ->get();

        $data = $neighborhoods->map(function ($n) use ($profiles) {
            $neighborhoodProfiles = $profiles->where('neighborhood_id', $n->id);
            $responses = $neighborhoodProfiles->flatMap(fn($p) => $p->user ? $p->user->responses : collect());

            return [
                'id' => $n->id,
                'neighborhood' => $n->name,
                'region' => $n->district->region->name ?? null,
                'district' => $n->district->name ?? null,
                'user_count' => $neighborhoodProfiles->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score') ?? 0, 2),
                'max_score' => $responses->max('total_score') ?? 0,
            ];
        });

        if (!$request->neighborhood_id) {
            $stringProfiles = $profiles->whereNull('neighborhood_id')->whereNotNull('neighborhood');
            $groupedString = $stringProfiles->groupBy('neighborhood');
            
            foreach ($groupedString as $neighborhoodName => $groupProfiles) {
                $first = $groupProfiles->first();
                $responses = $groupProfiles->flatMap(fn($p) => $p->user ? $p->user->responses : collect());
                
                $data->push([
                    'id' => null,
                    'neighborhood' => $neighborhoodName,
                    'region' => $first->district->region->name ?? null,
                    'district' => $first->district->name ?? null,
                    'user_count' => $groupProfiles->count(),
                    'response_count' => $responses->count(),
                    'avg_score' => round($responses->avg('total_score') ?? 0, 2),
                    'max_score' => $responses->max('total_score') ?? 0,
                ]);
            }
        }

        return response()->json($data->values());
    }

    /**
     * 4️⃣ Kompaniya bo‘yicha tahlil
     */
    public function byCompany(Request $request)
    {
        $companies = Company::query()
            ->when($request->neighborhood_id, fn($q) => $q->where('neighborhood_id', $request->neighborhood_id))
            ->when($request->company_id, fn($q) => $q->where('id', $request->company_id))
            ->with(['neighborhood.district.region'])
            ->get();

        $profilesQuery = \App\Models\UserProfile::with(['user.responses', 'district.region', 'neighborhoodRelation'])
            ->when($request->company_id, fn($q) => $q->where('company_id', $request->company_id));
            
        if ($request->neighborhood_id) {
            $profilesQuery->where(function($q) use ($request) {
                $q->where('neighborhood_id', $request->neighborhood_id)
                  ->orWhereHas('companyRelation', function($q2) use ($request) {
                      $q2->where('neighborhood_id', $request->neighborhood_id);
                  });
            });
        }
        
        $profiles = $profilesQuery->get();

        $data = $companies->map(function ($company) use ($profiles) {
            $companyProfiles = $profiles->where('company_id', $company->id);
            $responses = $companyProfiles->flatMap(fn($p) => $p->user ? $p->user->responses : collect());
            return [
                'id' => $company->id,
                'company' => $company->name,
                'region' => $company->neighborhood->district->region->name ?? null,
                'district' => $company->neighborhood->district->name ?? null,
                'neighborhood' => $company->neighborhood->name ?? null,
                'user_count' => $companyProfiles->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score') ?? 0, 2),
                'max_score' => $responses->max('total_score') ?? 0,
            ];
        });

        if (!$request->company_id) {
            $stringProfiles = $profiles->whereNull('company_id')->whereNotNull('company');
            $groupedString = $stringProfiles->groupBy('company');
            
            foreach ($groupedString as $companyName => $groupProfiles) {
                $first = $groupProfiles->first();
                $responses = $groupProfiles->flatMap(fn($p) => $p->user ? $p->user->responses : collect());
                
                $data->push([
                    'id' => null,
                    'company' => $companyName,
                    'region' => $first->district->region->name ?? null,
                    'district' => $first->district->name ?? null,
                    'neighborhood' => $first->neighborhoodRelation ? $first->neighborhoodRelation->name : $first->neighborhood,
                    'user_count' => $groupProfiles->count(),
                    'response_count' => $responses->count(),
                    'avg_score' => round($responses->avg('total_score') ?? 0, 2),
                    'max_score' => $responses->max('total_score') ?? 0,
                ]);
            }
        }

        return response()->json($data->values());
    }

    /**
     * 6️⃣ Foydalanuvchi faoliyati
     */
    public function userActivity()
    {
        $users = User::withCount('responses')
            ->with(['profile.companyRelation', 'responses' => function ($q) {
                $q->select('user_id', DB::raw('AVG(total_score) as avg_score'), DB::raw('MAX(created_at) as last_test'))
                    ->groupBy('user_id');
            }])->get();

        $data = $users->map(function ($user) {
            $stats = $user->responses->first();
            $companyName = null;
            if ($user->profile) {
                $companyName = $user->profile->companyRelation ? $user->profile->companyRelation->name : $user->profile->company;
            }
            return [
                'user' => $user->firstname .' '.$user->lastname,
                'company' => $companyName,
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
    public function leaderboard(Request $request)
    {
        $query = User::with('profile.companyRelation', 'profile.neighborhoodRelation')
            ->withAvg('responses', 'total_score');

//        $this->applyLocationFilters($query, $request);

        $leaders = $query->orderByDesc('responses_avg_total_score')->take(10)->get();

        return response()->json($leaders->map(function($u) {
            $companyName = null;
            if ($u->profile) {
                $companyName = $u->profile->companyRelation ? $u->profile->companyRelation->name : $u->profile->company;
            }
            return [
                'user' => $u->firstname.' '.$u->lastname,
                'company' => $companyName,
                'average_score' => round($u->responses_avg_total_score, 2),
            ];
        }));
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
        $regions = Region::all();
        $profiles = \App\Models\UserProfile::with('user.responses')->get();

        $data = $regions->map(function ($region) use ($profiles) {
            $regionProfiles = $profiles->where('region_id', $region->id);
            $responses = $regionProfiles->flatMap(fn($p) => $p->user ? $p->user->responses : collect());

            return [
                'region' => $region->name,
                'user_count' => $regionProfiles->count(),
                'response_count' => $responses->count(),
                'avg_score' => round($responses->avg('total_score') ?? 0, 2),
            ];
        });

        return response()->json($data);
    }
}
