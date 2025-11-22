<?php

namespace App\Http\Resources;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
//        dd($this);
        return [
            'id' => $this->id,
            'phone' => $this->phone,
            'region' => $this->region->name,
            'district' => $this->district->name,
            'neighborhood' =>
                is_object($this->neighborhood) ? $this->neighborhood->name : $this->neighborhood,

            'company' =>
                is_object($this->company) ? $this->company->name : $this->company,
        ];
    }
}
