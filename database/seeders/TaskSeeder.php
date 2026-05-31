<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        $project = Project::first();
        $user = User::first();

        if (!$project || !$user) {
            return;
        }

        Task::create([
            'project_id' => $project->id,
            'user_id' => $user->id,
            'title' => 'نمونه تسک',
            'description' => 'توضیحات نمونه تسک',
            'status' => 'pending',
        ]);
    }
}
