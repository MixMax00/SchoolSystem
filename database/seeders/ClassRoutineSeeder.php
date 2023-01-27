<?php

namespace Database\Seeders;

use App\Models\ClassRoutine;
use Illuminate\Database\Seeder;

class ClassRoutineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClassRoutine::factory()->count(6)->create();
    }
}
