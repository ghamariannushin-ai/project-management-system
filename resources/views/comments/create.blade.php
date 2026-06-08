@extends('layouts.app')

@section('content')
<div class="container">
    <h1>ثبت کامنت جدید</h1>

    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label>انتخاب تسک:</label><br>
            <select name="task_id" style="width: 100%; padding: 8px;">
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->title }}</option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label>متن کامنت:</label><br>
            <textarea name="content" rows="5" style="width: 100%; padding: 8px;"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">ذخیره کامنت</button>
        <a href="{{ route('comments.index') }}" class="btn" style="background:#6c757d;">انصراف</a>
    </form>
</div>
@endsection
