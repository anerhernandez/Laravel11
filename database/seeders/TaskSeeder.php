<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            'title' => 'Tarea 1',
            'description' => 'Descripción para tarea 1',
            'user_id' => 1
          ]);
          DB::table('tasks')->insert([
            'title' => 'Tarea 2',
            'description' => 'Descripción para tarea 2',
            'user_id' => 1
          ]);
          DB::table('tasks')->insert([
            'title' => 'Tarea 3',
            'description' => 'Descripción para tarea 3',
            'user_id' => 1
          ]);
          DB::table('tasks')->insert([
            'title' => 'Tarea furbo',
            'description' => 'Furbo',
            'user_id' => 2
          ]);
          DB::table('tasks')->insert([
            'title' => 'Tarea gambling',
            'description' => 'Gambling',
            'user_id' => 2
          ]);
          
    }
}
