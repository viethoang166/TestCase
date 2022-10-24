<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Level;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $levels = [
            [
                'name' => 'University',
                'note' => 'nothing',
            ],
            [
                'name' => 'Master',
                'note' => 'nothing',
            ]
        ];

        foreach($levels as $level){

            Level::create([
                'name' => $level['name'],
                'note' => $level['note']
            ]);
        }

        

            
    }
}
