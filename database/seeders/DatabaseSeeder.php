<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Format;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Mario',
            'email' => 'mario@email.com',
            'password' => bcrypt('password')
        ]);

        $categories = ['Azione', 'Superhero', 'Horror', 'Fantasy', 'Avventura'];

        foreach($categories as $nameCategory){
            Category::create([
                'name' => $nameCategory
            ]);
        }

        $formats = ['Paper', 'eBook', 'audioBook'];

        foreach($formats as $nameFormat){
            Format::create([
                'name' => $nameFormat
            ]);
        }

    }
}
