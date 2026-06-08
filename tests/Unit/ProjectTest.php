<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_has_tasks()
    {
        $project = Project::factory()->create();

        $task = Task::factory()->create([
            'project_id' => $project->id
        ]);

        $this->assertTrue($project->tasks->contains($task));
    }
}
