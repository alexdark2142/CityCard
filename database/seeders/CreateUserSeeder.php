<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Test',
            'email' => 'test@gmail.com',
            'phone' => '380931258978',
            'password' => bcrypt('12345678')
        ]);
    }
}
