@extends('layouts.admin')

@section('title', 'افزودن کامنت')
@section('page-title', 'ایجاد کامنت جدید')

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.comments.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">کاربر</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user) <option value="{{ $user->id }}">{{ $user->name }}</option> @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">تسک</label>
            <select name="task_id" class="form-control" required>
                @foreach($tasks as $task) <option value="{{ $task->id }}">{{ $task->title }}</option> @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">متن کامنت</label>
            <textarea name="content" class="form-control" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">ذخیره</button>
        <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">بازگشت</a>
    </form>
</div>
@endsection
