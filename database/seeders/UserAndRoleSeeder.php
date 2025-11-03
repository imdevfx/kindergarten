<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserAndRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'administrator',
            'educator',
            'director',
        ];

        // 🔹 Rollarni yaratamiz (agar mavjud bo‘lmasa)
        foreach ($roles as $roleName) {
            Role::firstOrCreate(['name' => $roleName,'guard_name' => 'api']);
        }

        $users = [
            [
                'role' => 'administrator',
                'firstname' => 'Administrator',
                'lastname' => 'Administrator',
                'login' => 'admin',
                'password' => 'admingarten',
            ],
            [
                'role' => 'director',
                'firstname' => 'Direktor',
                'lastname' => 'Direktor',
                'login' => 'direktor',
                'password' => 'director1',
            ],
            [
                'role' => 'educator',
                'firstname' => 'Tarbiyachi',
                'lastname' => 'Tarbiyachi',
                'login' => 'tarbiyachi',
                'password' => 'educator1',
            ],
        ];

        foreach ($users as $data) {
            $user = User::updateOrCreate(
                ['login' => $data['login']],
                [
                    'firstname' => $data['firstname'],
                    'lastname' => $data['lastname'],
                    'password' => $data['password'],
                ]
            );

            if ($data['login'] === 'admin') {
                // 🔹 Admin barcha rollarga ega bo‘ladi
                $user->syncRoles($roles);
            } else {
                // 🔹 Qolganlar faqat bitta rolega ega bo‘ladi
                $user->syncRoles([$data['role']]);
            }
        }

    }
}
