<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiamondPackageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'diamonds' => $this->diamonds,
            'price' => $this->price,
            'image_url' => $this->image_url,
        ];
    }
}
