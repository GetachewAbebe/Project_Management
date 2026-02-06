<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@betin.gov.et'],
            [
                'name' => 'BETin Administrator',
                'password' => Hash::make('BETin@2026'),
                'role' => 'admin',
            ]
        );
    }
}
