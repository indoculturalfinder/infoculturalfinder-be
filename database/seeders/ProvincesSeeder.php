<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProvincesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('provinces')->insert([
        	'name' => 'Jawa Barat'
        ]);
        DB::table('provinces')->insert([
        	'name' => 'Pontianak'
        ]);
        DB::table('provinces')->insert([
        	'name' => 'Gorontalo'
        ]);
        DB::table('provinces')->insert([
        	'name' => 'Merauke'
        ]);
        DB::table('provinces')->insert([
        	'name' => 'Sumatera Selatan'
        ]);
    }
}
