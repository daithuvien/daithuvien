<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Administrator',
            'email' => 'daithuvien@gmail.com',
            'role_id' => 1,
            'created_by' => 'System',
            'updated_by' => 'System',
            'password' => Hash::make('Daithuvien2022'),
            'delete_flag' => false,
        ]);
    }
}
