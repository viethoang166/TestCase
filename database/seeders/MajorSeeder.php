<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('majors')->insert([
            [
                'name' => 'CNTT',
                'note' => 'Vua của mọi ngành',
            ],
            [
                'name' => 'Marketing',
                'note' => 'Nhanh giàu',
            ],
            [
                'name' => 'Engineer',
                'note' => 'Đau lưng',
            ],
        ]);
    }
}
