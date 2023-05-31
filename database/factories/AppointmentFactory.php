<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

class AppointmentFactory extends Factory
{
    protected $model = Appointment::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'time' => $this->faker->time(),
            'service_type' => $this->faker->randomElement(['Service A', 'Service B', 'Service C']),
            'email' => $this->faker->email,
        ];
    }
}