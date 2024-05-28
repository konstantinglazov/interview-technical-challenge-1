<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
     */
    protected $fillable = [
        'type', // e.g., motorcycle, car, van
        'license_plate',
    ];

    /**
     * Get occupied parking spot
     * @return HasMany
     */
    public function parking_spots(): HasMany
    {
        return $this->hasMany(ParkingSpot::class);
    }
}
