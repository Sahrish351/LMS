<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    
    public function run(): void
    {
        $roles = [
            [
                'name'         => 'admin',
                'display_name' => 'Administrator',
                'description'  => 'Full access to manage the entire platform.',
            ],
            [
                'name'         => 'teacher',
                'display_name' => 'Teacher',
                'description'  => 'Can manage own courses, lessons, and students.',
            ],
            [
                'name'         => 'student',
                'display_name' => 'Student',
                'description'  => 'Can enroll in courses and access lessons.',
            ],
            [
                'name'         => 'support_staff',
                'display_name' => 'Support Staff',
                'description'  => 'Handles support tickets and student queries.',
            ],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']], 
                [
                    'display_name' => $role['display_name'],
                    'description'  => $role['description'],
                    'created_at'   => now(),
                    'updated_at'   => now(),
                ]
            );
        }

        $this->command->info('Roles created: admin, teacher, student, support_staff');
    }
}
