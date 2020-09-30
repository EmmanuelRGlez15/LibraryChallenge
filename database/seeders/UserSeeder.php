<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Emmanuel González',
            'email' => 'emmanuelrglez15@gmail.com',
        ]);

        User::create([
            'name' => 'Daniel Rodriguez',
            'email' => 'danielrodriguez@gmail.com',
        ]);
    }
}
