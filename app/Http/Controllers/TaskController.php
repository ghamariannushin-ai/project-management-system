<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::where('user_id', Auth::id())->latest()->get();
        return view('tasks.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,)
    {
        $data = $request->validate([
            'project_id'=> 'required|exists:projects,id',
            'title'=> 'required|string|max:255',
            'description' => 'nullable|string',
            'status'=>'nullable|in:pending,in_progress,completed',
        ]);
        $data['user_id']=Auth::id();
        Task::create($data);
        return redirect()->route('tasks.index')->with('success', 'تسک با موفقیت انجام شد ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        $task->load(['project','user','comments']);
        return view('tasks.show',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
       abort_if($task->user_id !== Auth::id(), 403);
        $projects = Project::where('user_id', Auth::id())->get();
        return view('tasks.edit', compact('task','projects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $data = $request->validate([
            'project_id'=> 'required|exists:projects,id',
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'status'=> 'required|in:pending,in_progress,completed',
        ]);
        $task->update($data);
        return redirect()->route('tasks.index')->with('success','با موفقیت به روز رسانی شد ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
    abort_if($task->user_id !== Auth::id(), 403);
    $task->delete();
    return redirect()->route('tasks.index')->with('success', 'تسک حذف شد.');

    }
}
