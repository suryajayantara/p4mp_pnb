<?php

namespace Database\Seeders;

use App\Models\WebContent;
use Illuminate\Database\Seeder;

class faculty_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebContent::create([
            'section' => "sejarah",
            'content' => "belum ada content"
        ]);

        WebContent::create([
            'section' => "visi_misi",
            'content' => "belum ada content"
        ]);

        WebContent::create([
            'section' => "sambutan",
            'content' => "belum ada content"
        ]);
    }
}
