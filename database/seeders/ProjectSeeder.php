<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@example.com')->first();
        $regularUser = User::where('email', 'user@example.com')->first();

        if (!$adminUser || !$regularUser) {
            return;
        }

        Project::create([
            'name' => 'پروژه اول ادمین',
            'description' => 'توضیحات پروژه اول توسط ادمین.',
            'user_id' => $adminUser->id,
        ]);

        Project::create([
            'name' => 'پروژه دوم ادمین',
            'description' => 'توضیحات پروژه دوم ادمین',
            'user_id' => $adminUser->id,
        ]);

        Project::create([
            'name' => 'پروژه کاربر عادی',
            'description' => 'پروژه مربوط به کاربر عادی هست',
            'user_id' => $regularUser->id,
        ]);
    }
}
