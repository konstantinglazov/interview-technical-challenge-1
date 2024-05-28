<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParkingSpotCollection;
use App\Models\ParkingSpot;
use App\Repositories\Interfaces\ParkingSpotRepositoryInterface;
use App\Http\Requests\ParkingSpotRequest;
use App\Http\Resources\ParkingSpotResource;
use Illuminate\Http\Request;

class ParkingSpotsController extends Controller
{
    private ParkingSpotRepositoryInterface $parkingSpotRepository;

    /**
     * Create new controller instance.
     *
     * ParkingSpotsController constructor.
     * @param ParkingSpotRepositoryInterface $parkingSpotRepository
     */
    public function __construct(ParkingSpotRepositoryInterface $parkingSpotRepository)
    {
        $this->parkingSpotRepository = $parkingSpotRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ParkingSpotCollection($this->parkingSpotRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Create a new parking spot
        $parkingSpot = ParkingSpot::create($request->all());

        return (new ParkingSpotResource($parkingSpot))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param ParkingSpot $parkingSpot
     * @return ParkingSpotResource
     */
    public function show($id)
    {
        $parkingSpot = ParkingSpot::findOrFail($id);
        return new ParkingSpotResource($this->parkingSpotRepository->findOneBy($parkingSpot));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $parkingSpot = ParkingSpot::findOrFail($id);

        if ($request->park) {
            $message = $this->parkingSpotRepository->park($parkingSpot, $request->all());
            if ($message) {
                return response()->json($message, 400);
            }
        } else {
            $this->parkingSpotRepository->unpark($parkingSpot);
        }

        return (new ParkingSpotResource($parkingSpot))
            ->response()
            ->setStatusCode(200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $parkingSpot = ParkingSpot::findOrFail($id);
        $parkingSpot = $this->parkingSpotRepository->findOneBy($parkingSpot);
        $parkingSpot->delete();

        return response()->json(null, 204);
    }
}
