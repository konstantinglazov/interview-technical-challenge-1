<?php

namespace Database\Seeders;

use App\Models\ParkingLot;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ParkingLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
		DB::table('parking_lots')->truncate();
		Schema::enableForeignKeyConstraints();

        ParkingLot::factory()->times(2)->create();
    }
}
