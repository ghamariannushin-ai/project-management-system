<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTaskTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_task()
{
    $admin = User::factory()->create([
        'role' => 'admin'
    ]);

    $project = Project::factory()->create();

    $response = $this->actingAs($admin)->post(route('admin.tasks.store'), [
        'project_id' => $project->id,
        'user_id' => $admin->id,
        'title' => 'تسک تست جدید',
        'description' => 'توضیحات تست',
        'status' => 'pending'
    ]);

    $response->assertRedirect(route('admin.tasks.index'));

    $this->assertDatabaseHas('tasks', [
        'title' => 'تسک تست جدید'
    ]);
}


public function test_admin_can_delete_task()
{
    $admin = User::factory()->create([
        'role' => 'admin'
    ]);

    $task = Task::factory()->create([
        'user_id' => $admin->id
    ]);

    $response = $this->actingAs($admin)
                     ->delete(route('admin.tasks.destroy', $task));

    $response->assertRedirect(route('admin.tasks.index'));

    $this->assertDatabaseMissing('tasks', [
        'id' => $task->id
    ]);
}


public function test_task_validation()
{
    $admin = User::factory()->create([
        'role' => 'admin'
    ]);

    $response = $this->actingAs($admin)
                     ->post(route('admin.tasks.store'), []);

    $response->assertSessionHasErrors([
        'title',
        'project_id',
        'user_id'
    ]);
}

}
