<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Directorate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DirectorUserSeeder extends Seeder
{
    public function run(): void
    {
        $directorates = Directorate::all();

        foreach ($directorates as $directorate) {
            $slug = Str::slug($directorate->name);
            User::updateOrCreate(
                ['email' => $slug . '@betin.gov.et'],
                [
                    'name' => $directorate->name . ' Director',
                    'password' => Hash::make('Director@2026'),
                    'role' => 'director',
                    'directorate_id' => $directorate->id,
                ]
            );
        }
    }
}
