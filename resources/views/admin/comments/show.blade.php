@extends('layouts.admin')

@section('title', 'مشاهده کامنت')
@section('page-title', 'جزئیات کامنت')

@section('content')
<div class="card p-4">
    <div class="mb-3">
        <strong>کاربر:</strong> {{ $comment->user->name ?? 'نامشخص' }}
    </div>
    <div class="mb-3">
        <strong>مربوط به تسک:</strong> {{ $comment->task->title ?? 'نامشخص' }}
    </div>
    <div class="mb-3">
        <strong>متن کامنت:</strong>
        <div class="p-3 bg-light border rounded mt-2">
            {{ $comment->content }}
        </div>
    </div>
    <div class="mb-3">
        <strong>تاریخ ثبت:</strong> {{ $comment->created_at->format('Y/m/d H:i') }}
    </div>

    <a href="{{ route('admin.comments.index') }}" class="btn btn-secondary">بازگشت به لیست</a>
</div>
@endsection
