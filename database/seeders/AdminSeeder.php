<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'P4MP Admins',
            'password' => bcrypt('12345678'),
            'email' => 'p4mp@pnb.ac.id',
        ]);
    }
}
