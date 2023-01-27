<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassRoutineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $time = [1,2,3,4,5,6,7,8,9,0];
        $subjectId = Subject::where("class_id",3)->pluck('id')->toArray();
        $teachers = Teacher::find($subjectId[array_rand($subjectId)]);
        return [
            "class_name"       => 3,
            "section"          => 5,
            "subject"          => $subjectId[array_rand($subjectId)],
            "teacher"          => $teachers->name,
            "day"              => "Saturday",
            "starting_hour"    => $time[array_rand($time)],
            "starting_minute"  => 0,
            "starting"         => "AM",
            "ending_hour"      =>  $time[array_rand($time)],
            "ending_minute"    => 0,
            "ending"           => "PM",

        ];
    }
}
