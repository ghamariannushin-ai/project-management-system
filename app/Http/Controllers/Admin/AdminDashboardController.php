<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;
use App\Models\Task;
use App\Models\Comment;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalAdmins = User::where('role', 'admin')->count(); // اگر role مبنای ماست
        $totalProjects = Project::count();
        $totalTasks = Task::count();
        $totalComments = Comment::count();

        $latestProjects = Project::orderByDesc('created_at')->take(5)->get();
        $latestTasks = Task::orderByDesc('created_at')->take(5)->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalAdmins',
            'totalProjects',
            'totalTasks',
            'totalComments',
            'latestProjects',
            'latestTasks'
        ));
    }
}
