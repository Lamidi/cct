<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'telkom123@gmail.com')->first();
        if (!$user) {
            User::create([
                'name' => 'Telkom123',
                'email' => 'telkom123@gmail.com',
                'nik' => '1234567890123456',
                'role' => 'admin',
                'password' => Hash::make('password')
            ]);
        }
    }
}
