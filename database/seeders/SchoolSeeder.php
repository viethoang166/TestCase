<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\School;
use App\Models\Majors;
use App\Models\City;
use App\Models\Country;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $school = School::create([
            'name' => 'Đại học Staffordshire',
            'country_id' => Country::where('code', 'LIKE', 'EN')->first()->id,
            'city_id' => City::where('name', 'LIKE', '%London%')->first()->id,
        ]);
        $school->majors()->sync(Majors::all());

        $school = School::create([
            'name' => 'Central Queensland University',
            'country_id' => Country::where('code', 'LIKE', 'AU')->first()->id,
            'city_id' => City::where('name', 'LIKE', '%Brisbane%')->first()->id,
        ]);
        $school->majors()->sync(Majors::all());

        $school = School::create([
            'name' => 'Algoma University',
            'country_id' => Country::where('code', 'LIKE', 'CA')->first()->id,
            'city_id' => City::where('name', 'LIKE', '%Montréal%')->first()->id,
        ]);
        $school->majors()->sync(Majors::all());

        $school = School::create([
            'name' => 'Holland International Study Centre',
            'country_id' => Country::where('code', 'LIKE', 'NL')->first()->id,
            'city_id' => City::where('name', 'LIKE', '%Leiden%')->first()->id,
        ]);
        $school->majors()->sync(Majors::all());

        $school = School::create([
            'name' => 'Đại học Harvard',
            'country_id' => Country::where('code', 'LIKE', 'US')->first()->id,
            'city_id' => City::where('name', 'LIKE', '%NewYork%')->first()->id,
        ]);
        $school->majors()->sync(Majors::all());
    }
}
