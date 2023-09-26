<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            ['state' => 'New'],
            ['state' => 'In Stock'],
            ['state' => 'Broken'],
            ['state' => 'Rented'],
            ['state' => 'Shot Down']
        ]);
    }
}
