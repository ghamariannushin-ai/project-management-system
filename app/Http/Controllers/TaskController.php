<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $projects = Project::where('user_id', Auth::id())->get();
        return view('tasks.create', compact('projects'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_id'=> 'required|exists:projects,id',
            'title'=> 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $data['user_id'] = Auth::id();
        $data['status'] = 'pending';

        Task::create($data);

        return redirect()->route('tasks.index')
            ->with('success','تسک با موفقیت ایجاد شد');
    }

    public function show(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);

        $task->load(['project','user','comments']);

        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);

        $projects = Project::where('user_id', Auth::id())->get();

        return view('tasks.edit', compact('task','projects'));
    }

    public function update(Request $request, Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);

        $data = $request->validate([
            'project_id'=> 'required|exists:projects,id',
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
        ]);

        $task->update($data);

        return redirect()->route('tasks.index')
            ->with('success','با موفقیت به روز رسانی شد');
    }

    public function destroy(Task $task)
    {
        abort_if($task->user_id !== Auth::id(), 403);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success','تسک حذف شد');
    }
}
