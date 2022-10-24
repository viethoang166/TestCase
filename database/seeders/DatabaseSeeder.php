<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Country;
use Illuminate\Database\Seeder;
use App\Models\Customer;
use App\Models\News;
use App\Models\Majors;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
        PermissionGroupSeed::class,
        PermissionSeed::class,
        RoleSeed::class,
        RolePermissionSeed::class,
        UserSeed::class,
        UserRoleSeed::class,
        ContactSeeder::class,
        CountrySeeder::class,
        LevelSeeder::class,
        CitySeeder::class,
        MajorSeeder::class,
        SchoolSeeder::class,
        ]);
        Customer::factory(15)->create();
        // News::factory(15)->create();
        // Majors::factory(11)->create();
       
    }
}
