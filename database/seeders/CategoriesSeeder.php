<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
        	'name' => 'Baju Adat',
        ]);
        DB::table('categories')->insert([
        	'name' => 'Makanan Khas',
        ]);
        DB::table('categories')->insert([
        	'name' => 'Rumah Adat',
        ]);
        DB::table('categories')->insert([
        	'name' => 'Tarian Adat',
        ]);
    }
}
