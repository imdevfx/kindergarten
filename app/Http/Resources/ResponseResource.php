<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResponseResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        // Har bir category bo‘yicha hisob
        $results = $this->answers
            ->groupBy(fn($a) => optional($a->question->category)->name ?? 'Nomaʼlum kategoriya')
            ->map(function ($group, $categoryName) {
                $total = $group->sum('value');
                $max = $group->count() * 4;

                return [
                    'category' => $categoryName,
                    'score' => $total,
                    'max_score' => $max,
                    'percent' => round(($max ? ($total / $max) * 100 : 0)),
                    'level' => $this->scoreCategory($total, $max),
                ];
            })
            ->values(); // kolleksiyani indexlangan massivga o‘tkazamiz

        return [
            'results' => $results,
        ];
    }

    private function scoreCategory($score, $max)
    {
        if ($max == 0) return 'Nomaʼlum';
        $p = ($score / $max) * 100;

        return match (true) {
            $p <= 40 => 'Kasbiy motivatsiya past, qiziqishni oshirish kerak.',
            $p > 40 && $p <= 60 => 'Barqaror, ammo ilhomni oshirish lozim.',
            $p > 60 && $p <= 80 => 'Yaxshi tarbiyachi, lekin ayrim sohalarda rivojlanish kerak.',
            $p > 80 => 'Haqiqiy fidoyi tarbiyachi!',
            default => 'Nomaʼlum',
        };
    }
}
