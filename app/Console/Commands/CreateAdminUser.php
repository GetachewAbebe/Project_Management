<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Enums\UserRole;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'app:create-admin';
    protected $description = 'Create a default admin user';

    public function handle()
    {
        $user = User::updateOrCreate(
            ['email' => 'admin@betin.gov.et'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
                'role' => UserRole::ADMIN,
            ]
        );

        $this->info('Admin user created/updated successfully: ' . $user->email);
    }
}
