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

### UnPark
```json
{
    "park": false
}
```
