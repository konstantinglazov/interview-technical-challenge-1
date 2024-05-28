<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ParkingSpot extends Model
{
    use HasFactory;

    protected $foreignKey = ['vehicle_id', 'parking_lot_id'];


    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
     */
    protected $fillable = [
        'vehicle_id',
        'parking_lot_id',
        'is_available',
        'spot_type', // regular, car, van
    ];


    /**
     * Get the parking lot reocord associated with parking spot
     * @return BelongsTo
     */
    public function parking_lot(): BelongsTo
    {
        return $this->belongsTo(ParkingLot::class);
    }


    /**
     * Get the vehicle record associated with parking spot
     * @return BelongsTo
     */
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }
}
