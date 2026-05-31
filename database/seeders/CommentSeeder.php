<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $task = Task::first();
        $user = User::first();

        if (!$task || !$user) {
            return;
        }

        Comment::create([
            'task_id' => $task->id,
            'user_id' => $user->id,
            'content' => 'این یک کامنت نمونه است.',
        ]);
    }
}
