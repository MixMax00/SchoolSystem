<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
     //    $this->call([
	    //     DivisionSeeder::class,
	    //     DistrictSeeder::class,
	    //     UpazilaSeeder::class,
	    //     UnionSeeder::class,
	    // ]);


        // $this->call(PermissionSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(UserSeeder::class);

        // $this->call(ClassRoutineSeeder::class);
         // $this->call(StudentSeeder::class);

         $this->call([

            FundSeeder::class,
            HeadSeeder::class,
        ]);
    }
}
