<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Part>
 */
class PartFactory extends Factory
{
    public function definition()
    {
        // Select a random Car model from the database
        $car = Car::inRandomOrder()->first();

        $parts = [
            'Engine',
            'Transmission',
            'Suspension system',
            'Brake system',
            'Steering system',
            'Exhaust system',
            'Fuel system',
            'Electrical system',
            'Interior components',
            'Exterior components',
            'Wheels and tires'
        ];

        $randomPart = collect($parts)->random();

        return [
            'car_id' => $car->id,
            'name' => $randomPart,
            'serial_number' => $this->faker->unique()->regexify('[A-Z]{3}-[0-9]{3}-[A-Z]{2}'),
        ];
    }
}
