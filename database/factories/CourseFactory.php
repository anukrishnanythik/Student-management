<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'Coursename' =>$this->faker->randomElement(['Physics','Chemistry','Maths','Biology']),
            'Teachername' =>$this->faker->name(),
            'Batchtime' =>$this->faker->time($format = 'H:i') ,
            'Teachingday' =>$this->faker->dayOfWeek($max = 'now')




        ];
    }
}
