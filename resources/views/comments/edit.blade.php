@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ویرایش کامنت</h1>

    <form action="{{ route('comments.update', $comment) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>تسک:</label><br>
            <select name="task_id" style="width: 100%; padding: 8px;">
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}" {{ $comment->task_id == $task->id ? 'selected' : '' }}>
                        {{ $task->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>متن کامنت:</label><br>
            <textarea name="content" rows="5" style="width: 100%; padding: 8px;">{{ $comment->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">به‌روزرسانی</button>
        <a href="{{ route('comments.index') }}" class="btn" style="background:#6c757d;">انصراف</a>
    </form>
</div>
@endsection
