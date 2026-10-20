<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // Har bir category bo'yicha to'g'ri javoblar hisob
        $results = $this->answers
            ->groupBy(fn($a) => optional(optional($a->question)->category)->name ?? 'Nomaʼlum kategoriya')
            ->map(function ($group, $categoryName) {
                $correct = $group->filter(fn($a) => optional($a->variant)->answer == true)->count();
                $total   = $group->count();

                return [
                    'category'  => $categoryName,
                    'correct'   => $correct,
                    'total'     => $total,
                    'percent'   => $total > 0 ? round(($correct / $total) * 100) : 0,
                    'level'     => $this->scoreCategory($correct, $total),
                ];
            })
            ->values(); // kolleksiyani indexlangan massivga o'tkazamiz

        return [
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
