<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
   
    public function run(): void
    {
       
        $adminRoleId = DB::table('roles')->where('name', 'admin')->value('id');

        if (! $adminRoleId) {
            $this->command->error("No 'admin' role found in roles table. Run RoleSeeder first: php artisan db:seed --class=RoleSeeder");
            return;
        }

        User::updateOrCreate(
            ['email' => 'admin@lms.com'],
            [
                'name'     => 'Super Admin',
                'email'    => 'admin@lms.com',
                'password' => Hash::make('password123'),
                'role_id'  => $adminRoleId,
            ]
        );

        $this->command->info('Admin user created:');
        $this->command->info('Email: admin@lms.com');
        $this->command->info('Password: password123');
    }
}
