<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\User;

class AdminProjectSeeder extends Seeder
{
    public function run(): void
    {
        // اگر کاربر ادمین دارید، همان را بردارید
        // اینجا نمونه ساده:
        $admin = User::where('email', 'admin@example.com')->first();

        if (!$admin) {
            $admin = User::factory()->create([
                'name' => 'Admin User',
                'email' => 'admin@example.com',
            ]);
        }

        Project::create([
            'user_id' => $admin->id,
            'name' => 'پروژه تست ادمین',
            'description' => 'این پروژه از طریق AdminProjectSeeder ساخته شده است.',
        ]);
    }
}
