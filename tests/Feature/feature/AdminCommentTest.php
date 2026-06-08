<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Task;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminCommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_comment()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $task = Task::factory()->create();

        $response = $this->actingAs($admin)->post(route('admin.comments.store'), [
            'task_id' => $task->id,
            'user_id' => $admin->id,
            'content' => 'محتوای تست کامنت'
        ]);

        $response->assertRedirect(route('admin.comments.index'));

        $this->assertDatabaseHas('comments', [
            'content' => 'محتوای تست کامنت'
        ]);
    }

    public function test_comment_validation()
    {
        $admin = User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($admin)
                         ->post(route('admin.comments.store'), []);

        $response->assertSessionHasErrors([
            'task_id',
            'user_id',
            'content'
        ]);
    }
}
