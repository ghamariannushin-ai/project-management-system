<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Comment;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();

        $projects = Project::where('user_id', $user->id)->latest()->take(5)->get();
        $comments = Comment::where('user_id', $user->id)->latest()->take(5)->get();
        $tasks = Task::where('user_id', $user->id)->latest()->take(5)->get();

        $projectCount = Project::where('user_id', $user->id)->count();
        $commentCount = Comment::where('user_id', $user->id)->count();
        $taskCount = Task::where('user_id', $user->id)->count();

        return view('home', compact(
            'projects',
            'comments',
            'tasks',
            'projectCount',
            'commentCount',
            'taskCount'
        ));
    }
}

