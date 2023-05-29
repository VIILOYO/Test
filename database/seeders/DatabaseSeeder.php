<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use App\Models\WorkPosition;
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
        Department::factory(5)->create();
        WorkPosition::factory(20)->create();
        User::factory(150)->create();
    }
}
