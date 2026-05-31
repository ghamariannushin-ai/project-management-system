<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminCommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with(['task', 'user'])->latest()->paginate(10);
        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        $tasks = Task::all();
        $users = User::all();
        return view('admin.comments.create', compact('tasks', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        Comment::create($data);

        return redirect()->route('admin.comments.index')->with('success', 'کامنت ایجاد شد.');
    }

    public function show(Comment $comment)
    {
        return view('admin.comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        $tasks = Task::all();
        $users = User::all();
        return view('admin.comments.edit', compact('comment', 'tasks', 'users'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'user_id' => 'required|exists:users,id',
            'content' => 'required|string',
        ]);

        $comment->update($data);

        return redirect()->route('admin.comments.index')->with('success', 'کامنت به‌روزرسانی شد.');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index')->with('success', 'کامنت حذف شد.');
    }
}
