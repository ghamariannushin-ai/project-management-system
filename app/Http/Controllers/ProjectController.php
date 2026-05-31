<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Project::class, 'project');
    }

    public function index()
    {
        if (auth()->user()->role === 'admin') {
            $projects = Project::latest()->paginate(10);
        } else {
            $projects = Project::where('user_id', auth()->id())->latest()->paginate(10);
        }

        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Project::create([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('projects.index')->with('success', 'ثبت اطلاعات با موفقیت انجام شد');
    }

    public function show(Project $project)
    {
        abort_if(auth()->user()->role !== 'admin' && $project->user_id !== Auth::id(), 403);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        abort_if(auth()->user()->role !== 'admin' && $project->user_id !== Auth::id(), 403);

        return view('projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        abort_if(auth()->user()->role !== 'admin' && $project->user_id !== Auth::id(), 403);

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $project->update([
            'name' => $data['name'],
            'description' => $data['description'] ?? null,
        ]);

        return redirect()->route('projects.index')->with('success', 'پروژه ویرایش شد');
    }

    public function destroy(Project $project)
    {
        abort_if(auth()->user()->role !== 'admin' && $project->user_id !== Auth::id(), 403);

        $project->delete();

        return redirect()->route('projects.index')->with('success', 'با موفقیت حذف شد');
    }
}
