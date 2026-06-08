@extends('layouts.admin')

@section('title', 'افزودن تسک')
@section('page-title', 'ایجاد تسک جدید')

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">عنوان تسک</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">پروژه</label>
            <select name="project_id" class="form-control" required>
                <option value="">یک پروژه انتخاب کنید</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">اختصاص به کاربر</label>
            <select name="user_id" class="form-control" required>
                <option value="">یک کاربر انتخاب کنید</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">وضعیت</label>
            <select name="status" class="form-control">
                <option value="pending">در انتظار (Pending)</option>
                <option value="in_progress">در حال انجام (In Progress)</option>
                <option value="completed">تکمیل شده (Completed)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">توضیحات</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success">ذخیره تسک</button>
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">بازگشت</a>
    </form>
</div>
@endsection
