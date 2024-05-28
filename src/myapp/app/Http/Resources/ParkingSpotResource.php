<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ParkingSpotResource extends JsonResource
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
            'is_available' => $this->is_available,
            'parking_lot_id' => $this->parking_lot_id,
            'spot_type' => $this->spot_type,

            // related objects
            'parking_lot' => $this->parking_lot,
            'vehicle' => $this->vehicle,
        ];
    }
}
