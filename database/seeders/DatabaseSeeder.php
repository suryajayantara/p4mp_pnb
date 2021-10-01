<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Category::create([
            'category_name' => 'sejarah',
            'desc' => 'menjelaskan tentang sejarah'
        ]);


        Category::create([
            'category_name' => 'visi_misi',
            'desc' => 'menjelaskan tentang Visi Misi'
        ]);


        Category::create([
            'category_name' => 'sambutan',
            'desc' => 'menjelaskan tentang Sambutan Kepala'
        ]);
    }
}
