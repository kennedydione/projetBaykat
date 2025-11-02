<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Option 1: promouvoir un utilisateur existant par email (modifiez si besoin)
        $email = env('ADMIN_SEED_EMAIL', 'admin@example.com');
        $password = env('ADMIN_SEED_PASSWORD', 'password');

        $user = User::where('email', $email)->first();
        if ($user) {
            $update = ['role' => 'admin'];
            if (!empty($password)) {
                $update['password'] = Hash::make($password);
            }
            $user->update($update);
        } else {
            // Option 2: créer un nouvel admin
            User::updateOrCreate(
                ['email' => $email],
                [
                    'name' => 'Super Admin',
                    'password' => Hash::make($password),
                    'role' => 'admin',
                ]
            );
        }

        // Option 3: promouvoir le premier user si aucun admin n'existe
        if (!User::where('role', 'admin')->exists()) {
            $first = User::first();
            if ($first) {
                $first->update(['role' => 'admin']);
            }
        }
    }
}
