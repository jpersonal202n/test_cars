<?php

namespace App\Http\Resources;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array_filter([
            'id'           => $this->uuid,
            'name'         => $this->name,
            'description'  => $this->description,
            'municipality' => $this->municipality,
            'cars'         => CarResource::collection($this->whenLoaded('cars'))
        ]);
    }
}
