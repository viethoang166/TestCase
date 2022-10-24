<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'image' => '',
            'hotline' => '0123456789',
            'email' => Str::random(10).'@gmail.com',
            'address' => 'Nam Từ Liêm, Hà Nội',
            'facebook' => 'King Study',
            'zalo' => '0123456789',
            'map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.444540603958!2d105.78030341492925!3d21.014891643627546!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab554eba8445%3A0xcf9a816d7e57b044!2zTeG7hSBUcsOsIEjhuqEsIE3hu4UgVHLDrCwgVOG7qyBMacOqbSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1663145841037!5m2!1svi!2s'
        ]);
    }
}
