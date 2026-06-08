<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task; // این خط را اضافه کنید
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::with('task')->get();
        return view('comments.index', compact('comments'));
    }

    public function create()
    {
        $tasks = Task::all();
        return view('comments.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'task_id'=>'required|exists:tasks,id',
            'content'=>'required|string',
        ]);

        $data['user_id'] = Auth::id();
        Comment::create($data);
        return redirect()->route('comments.index')->with('success','کامنت ثبت شد');
    }

    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        abort_if($comment->user_id !== Auth::id(), 403);

        $tasks = Task::all();
        return view('comments.edit', compact('comment', 'tasks'));
    }

    public function update(Request $request, Comment $comment)
    {
        $data = $request->validate([
            'content'=> 'required|string',
            'task_id'=> 'required|exists:tasks,id',
        ]);
        $comment->update($data);
        return redirect()->route('comments.index')->with('success','کامنت ویرایش شد');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back()->with('success','کامنت حذف شد');
    }
}
