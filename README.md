# Technical Interview Challenge 1

## Installation

1. Install docker compose https://docs.docker.com/compose/install/#scenario-one-install-docker-desktop
2. Clone the repository
2. Run `docker-compose up`
4. Run `docker-compose exec my-app composer install -o`
3. Run `docker-compose exec my-app php artisan migrate`
4. Load in browser http://localhost:8081


# API Reference

## PUT
http://localhost:8081/api/parking-spots/5

body row sample data: 

### Park
```json
{
    "park": true,
    "vehicle": {
        "type": "van",
        "license_plate": "TEST"
    }
}
```

#### Response
```json
{
    "message": "Parking spot is not available for van!",
    "vehicle": {
        "id": 2,
        "type": "van",
        "license_plate": "Facere.",
        "created_at": "2024-05-27T14:59:24.000000Z",
        "updated_at": "2024-05-27T14:59:24.000000Z"
    }
}
```
#### Request to park car 
```json
{
    "park": true,
    "vehicle": {
        "type": "car",
        "license_plate": "TEST2"
    }
}
```

```json
{
    "data": {
        "id": 5,
        "is_available": false,
        "parking_lot_id": 1,
        "spot_type": "car",
        "parking_lot": null,
        "vehicle": {
            "id": 16,
            "type": "car",
            "license_plate": "TEST",
            "created_at": "2024-05-28T04:16:24.000000Z",
            "updated_at": "2024-05-28T04:16:24.000000Z"
        }
    }
}
```


### UnPark
```json
{
    "park": false
}
```

#### Response
```json
{
    "data": {
        "id": 5,
        "is_available": true,
        "parking_lot_id": 1,
        "spot_type": "car",
        "parking_lot": null,
        "vehicle": null
    }
}
```