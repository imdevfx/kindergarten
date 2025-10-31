<?php

namespace App\Http\Resources;

use App\Enums\RoleEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
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
            'response' => $this->responses()->exists()
        ];
    }
}
