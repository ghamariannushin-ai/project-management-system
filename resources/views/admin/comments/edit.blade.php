@extends('layouts.admin')

@section('title', 'ویرایش کامنت')
@section('page-title', 'ویرایش کامنت')

@section('content')
<div class="card p-4">
    <form action="{{ route('admin.comments.update', $comment->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="mb-3">
            <label class="form-label">کاربر</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $comment->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">تسک مرتبط</label>
            <select name="task_id" class="form-control"></select>
            <label class="form-label">متن کامنت</label>
            <textarea name="content" class="form-control" rows="5">{{ $comment->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-warning">به‌روزرسانی</button>
        <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">بازگشت</a>
    </form>
</div>
@endsection
