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
                'password'          => Hash::make('admin12345'),
                'role'              => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // ── Regular Users ──────────────────────────────────────────────────
        $users = [
            [
                'name'              => 'Budi Santoso',
                'email'             => 'budi@example.com',
                'password'          => Hash::make('user12345'),
                'role'              => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Siti Rahayu',
                'email'             => 'siti@example.com',
                'password'          => Hash::make('user12345'),
                'role'              => 'user',
                'email_verified_at' => now(),
            ],
            [
                'name'              => 'Rizky Pratama',
                'email'             => 'rizky@example.com',
                'password'          => Hash::make('user12345'),
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
                ['admin', 'admin@gmail.com', 'admin12345'],
                ['user',  'budi@example.com',   'user12345'],
                ['user',  'siti@example.com',   'user12345'],
                ['user',  'rizky@example.com',  'user12345'],
            ]
        );
    }
}
