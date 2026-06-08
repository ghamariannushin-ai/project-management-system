<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Comment;
use App\Models\User;
use App\Models\Task;

class CommentTest extends TestCase
{
    public function test_comment_belongs_to_user_and_task()
    {
        $comment = Comment::factory()->create();

        $this->assertInstanceOf(User::class, $comment->user);
        $this->assertInstanceOf(Task::class, $comment->task);
    }
}
