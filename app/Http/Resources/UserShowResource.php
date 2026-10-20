<?php

namespace App\Http\Resources;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // ⚡️ Barcha javoblar (responses -> answers -> question -> category)
        $answers = $this->responses
            ->flatMap(fn($response) => $response->answers);

        // 🧮 Kategoriya bo‘yicha hisoblash
        $results = $answers
            ->groupBy(fn($a) => optional(optional($a->question)->category)->name ?? 'Nomaʼlum kategoriya')
            ->map(function ($group, $categoryName) {
                $correct = $group->filter(fn($a) => optional($a->variant)->answer == true)->count();
                $total   = $group->count();

                return [
                    'category' => $categoryName,
                    'correct'  => $correct,
                    'total'    => $total,
                    'percent'  => $total > 0 ? round(($correct / $total) * 100) : 0,
                    'level'    => $this->scoreCategory($correct, $total),
                ];
            })
            ->values();

        return [
            'id' => $this->id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'login' => $this->login,
            'is_active' => $this->is_active,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'roles' => $this->getRoleNames()
                ->map(fn($role) => RoleEnum::from($role)->label())
                ->values(),
            'profile' => new ProfileResource($this->profile),
            'results' => $results,
        ];
    }

    private function scoreCategory(int $correct, int $total): string
    {
        if ($total == 0) return 'Nomaʼlum';
        $p = ($correct / $total) * 100;

        return match (true) {
            $p <= 40              => 'Kasbiy motivatsiya past, qiziqishni oshirish kerak.',
            $p > 40 && $p <= 60  => 'Barqaror, ammo ilhomni oshirish lozim.',
            $p > 60 && $p <= 80  => 'Yaxshi tarbiyachi, lekin ayrim sohalarda rivojlanish kerak.',
            $p > 80              => 'Haqiqiy fidoyi tarbiyachi!',
            default              => 'Nomaʼlum',
        };
    }
}
