@extends('layouts.app')

@section('content')
<div class="container">
    <h1>مشاهده جزئیات کامنت</h1>

    <div style="border: 1px solid #ddd; padding: 20px; border-radius: 10px; background: #fff;">
        <p><strong>تسک:</strong> {{ $comment->task->title ?? 'نامشخص' }}</p>
        <p><strong>متن کامنت:</strong></p>
        <div style="background: #f1f1f1; padding: 15px; border-radius: 5px;">
            {{ $comment->content }}
        </div>
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('comments.index') }}" class="btn btn-primary">بازگشت به لیست</a>
    </div>
</div>
@endsection
