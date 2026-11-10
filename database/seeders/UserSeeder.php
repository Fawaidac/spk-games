<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Seed users dengan role admin dan user.
     */
    public function run(): void
    {
        // ── Admin ─────────────────────────────────────────────────────────
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'              => 'Super Admin',
                'email'             => 'admin@gmail.com',
                'password'          => Hash::make('password'),
                'role'              => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // ── Regular Users ──────────────────────────────────────────────────
        $users = [
            [
                'name'              => 'Budi Santoso',
                'email'             => 'user@gmail.com',
                'password'          => Hash::make('password'),
                'role'              => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Siti Rahayu',
                'email'             => 'siti@gmail.com',
                'password'          => Hash::make('password'),
                'role'              => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Rizky Pratama',
                'email'             => 'user2@gmail.com',
                'password'          => Hash::make('password'),
                'role'              => 'user',
                'email_verified_at' => now(),
            ],
        ];

        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']],
                $userData
            );
        }

        $this->command->info('✅ UserSeeder: Admin & User berhasil di-seed.');
        $this->command->table(
            ['Role', 'Email', 'Password'],
            [
                ['admin', 'admin@gmail.com', 'password'],
                ['user',  'user@gmail.com',   'password'],
                ['user',  'user2@gmail.com',   'password'],
                ['user',  'user3@gmail.com',  'password'],
            ]
        );
    }
}
