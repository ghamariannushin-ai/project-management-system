<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProjectController extends Controller
{
    public function index()
    {
        // ادمین همه پروژه‌ها را می‌بیند
        $projects = Project::with('user')->latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        // برای اینکه ادمین بتواند پروژه را به یک کاربر اختصاص دهد
        $users = User::latest()->get();

        return view('admin.projects.create', compact('users'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
            'user_id' => $validated['user_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'پروژه با موفقیت ایجاد شد.');
    }

    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $users = User::latest()->get();

        return view('admin.projects.edit', compact('project', 'users'));
    }

    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update([
            'user_id' => $validated['user_id'],
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
        ]);

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'پروژه به‌روزرسانی شد.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->route('admin.projects.index')
            ->with('success', 'پروژه حذف شد.');
    }
}
