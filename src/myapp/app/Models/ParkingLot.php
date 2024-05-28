<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ParkingLot extends Model
{
    use HasFactory;

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
    protected $fillable = [
        'name',
        'address',
        'total_capacity',
    ];

    /**
     * Get the parking spots reocords associated with parking lot
     * @return HasMany
     */
    public function parking_spots(): HasMany
    {
        return $this->hasMany(ParkingSpot::class);
    }
}
