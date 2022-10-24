<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Country;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::where('code', 'LIKE', 'EN')->first()->cities()->create([
            'name' => 'London',
        ]);
        Country::where('code', 'LIKE', 'US')->first()->cities()->create([
            'name' => 'NewYork',
        ]);
        Country::where('code', 'LIKE', 'NL')->first()->cities()->create([
            'name' => 'Leiden',
        ]);
        Country::where('code', 'LIKE', 'CA')->first()->cities()->create([
            'name' => 'Montréal',
        ]);
        Country::where('code', 'LIKE', 'AU')->first()->cities()->create([
            'name' => 'Brisbane',
        ]);

    }
}
