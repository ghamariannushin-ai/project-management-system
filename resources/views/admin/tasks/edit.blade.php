@extends('layouts.admin')

@section('title', 'ویرایش تسک')
@section('page-title', 'ویرایش تسک: ' . $task->title)

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">عنوان تسک</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">پروژه</label>
            <select name="project_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $task->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">اختصاص به کاربر</label>
            <select name="user_id" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $task->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>در انتظار (Pending)</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>در حال انجام (In Progress)</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>تکمیل شده (Completed)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">توضیحات</label>
            <textarea name="description" class="form-control" rows="3">{{ $task->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-warning">به‌روزرسانی</button>
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">بازگشت</a>
    </form>
</div>
@endsection
