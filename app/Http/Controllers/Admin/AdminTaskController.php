<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminTaskController extends Controller
{
    public function index()
    {
        // ادمین همه تسک‌ها را می‌بیند
        $tasks = Task::with(['project', 'user'])->latest()->paginate(10);

        return view('admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        // برای انتخاب پروژه و کاربر
        $projects = Project::latest()->get();
        $users = User::latest()->get();

        return view('admin.tasks.create', compact('projects', 'users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,in_progress,completed',
        ]);

        Task::create([
            'project_id' => $validated['project_id'],
            'user_id' => $validated['user_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'] ?? 'pending',
        ]);

        return redirect()
            ->route('admin.tasks.index')
            ->with('success', 'تسک با موفقیت ایجاد شد.');
    }

    public function show(Task $task)
    {
        return view('admin.tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        $projects = Project::latest()->get();
        $users = User::latest()->get();

        return view('admin.tasks.edit', compact('task', 'projects', 'users'));
    }

    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|in:pending,in_progress,completed',
        ]);

        $task->update([
            'project_id' => $validated['project_id'],
            'user_id' => $validated['user_id'],
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'status' => $validated['status'] ?? 'pending',
        ]);

        return redirect()
            ->route('admin.tasks.index')
            ->with('success', 'تسک به‌روزرسانی شد.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()
            ->route('admin.tasks.index')
            ->with('success', 'تسک حذف شد.');
    }
}
