<?php

namespace App\Repositories;

use App\Models\ParkingSpot;
use App\Models\Vehicle;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Interfaces\ParkingSpotRepositoryInterface;
use Exception;
use Illuminate\Database\Eloquent\Collection;

class ParkingSpotRepository extends BaseRepository implements ParkingSpotRepositoryInterface
{
    /**
     * ParkingSpotRespository constractor
     * @param ParkingSpot $model
     */
    public function __construct(ParkingSpot $model)
    {
        parent::__construct($model);
    }

    /**
     * List all Parking spot entities
     * @return ParkingSpot[]|Collection
     */
    public function all(): Collection
    {
        return $this->model->all();
    }

    /**
     * Find one ParkingSpot entity
     *
     * @param ParkingSpot $parkingSpot
     * @return ParkingSpot|Collection
     */
    public function findOneBy(ParkingSpot $parkingSpot)
    {
        return $this->model->findOrFail($parkingSpot->id);
    }


    /**
     * Park vehicle on the specified parking spot
     *
     * @param ParkingSpot $parkingSpot
     * @param array $vehicleDetails
     *
     * @return array | null
     */
    public function park(ParkingSpot $parkingSpot, array $vehicleDetails)
    {
        // validate vehicle details
        if ($parkingSpot->is_available === false) {
            // parking spot is not available
            return ['message' => 'Parking spot is not available!', 'vehicle' => $parkingSpot->vehicle];
        }

        // TODO: This implementation checks if the vehicle is a van and, if so, finds three consecutive regular spots that are available. If there are enough available spots, it parks the van by marking those spots as unavailable. For motorcycles and cars, it simply marks any available regular spot as unavailable.
        // parking spot for van requires larger amount of space assigned for van.
        if ($vehicleDetails['vehicle']['type'] === 'van' && $parkingSpot->spot_type !== 'van') {
            // parking spot is not available for this vehicle
            return ['message' => 'Parking spot can not accomodate van!', 'vehicle' => $parkingSpot->vehicle];
        }

        $vehicle = Vehicle::create($vehicleDetails['vehicle']);
        $parkingSpot->update(['is_available' => false, 'vehicle_id' => $vehicle->id]);
    }

    /**
     * Unpark vehicle from the specified parking spot
     *
     * @param ParkingSpot $parkingSpot
     */
    public function unpark(ParkingSpot $parkingSpot)
    {
        $vehicle = Vehicle::findOrFail($parkingSpot->vehicle_id);
        $vehicle->delete();

        $parkingSpot->update(['is_available' => true, 'vehicle_id' => null]);
    }

}
