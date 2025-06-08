<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => $this->role,
            'balance' => $this->balance, // <-- PENAMBAHAN KRUSIAL
            'registered_at' => $this->created_at->format('d-m-Y H:i'),
        ];
    }
}
