<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {
        DB::table('categorias')->insert([
            'name' => 'Café',
            'icon' => 'cafe',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categorias')->insert([
            'name' => 'Hamburguesas',
            'icon' => 'hamburguesa',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categorias')->insert([
            'name' => 'Pizzas',
            'icon' => 'pizza',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categorias')->insert([
            'name' => 'Donas',
            'icon' => 'dona',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categorias')->insert([
            'name' => 'Pasteles',
            'icon' => 'pastel',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        
        DB::table('categorias')->insert([
            'name' => 'Galletas',
            'icon' => 'galletas',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
