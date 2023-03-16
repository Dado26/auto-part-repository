<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Part;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = Car::all();

        foreach($cars as $car){
            Part::factory()->times(4)->create([
                'car_id' => $car->id
            ]);
        }
    }
}
