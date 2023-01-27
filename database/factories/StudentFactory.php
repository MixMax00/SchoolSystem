<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{

    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "institute_name"       => "QSAC",
            "branch"               => "Dhaka",
            "class_roll"           => "2".$this->faker->randomNumber(5, true),
            "class"                => 2,
            "group"                => 3,
            "technology"           => "Computer",
            "semester"             => 5,
            "session"              => "2021-2022",
            "student_name_eng"     => $this->faker->words(5),
            "father_name_eng"      => $this->faker->words(5),
            "mother_name_eng"      => $this->faker->words(5),
            "role_id"              => 7,
            "email"                => $this->faker->unique()->safeEmail(),
            "password"             => Hash::make('12345678'),
        ];
    }
}
