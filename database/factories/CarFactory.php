<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    
    public function definition()
    {
    
     $cars = [
    'Honda Civic',
    'Toyota Corolla',
    'Ford Mustang',
    'Chevrolet Camaro',
    'BMW 3 Series',
    'Mercedes-Benz C-Class',
    'Audi A4',
    'Subaru Impreza',
    'Mazda MX-5',
    'Porsche 911'
     ];

shuffle($cars);

// Pop the last element from the shuffled array
$randomCar = array_pop($cars);

        return [
            'name' => $randomCar,
            'registration_number' => $this->faker->unique()->regexify('[A-Z]{2}-[0-9]{2}-[A-Z]{2}'),
            'is_registered' => true,
        ];
    }
}
