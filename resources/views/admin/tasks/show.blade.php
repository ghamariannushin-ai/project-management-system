@extends('layouts.admin')

@section('title', 'جزئیات تسک')
@section('page-title', 'جزئیات تسک')

@section('content')
<div class="card p-4">
    <h5>عنوان: {{ $task->title }}</h5>
    <hr>
    <p><strong>پروژه:</strong> {{ $task->project->name ?? '-' }}</p>
    <p><strong>وضعیت:</strong> {{ $task->status }}</p>
    <p><strong>توضیحات:</strong></p>
    <div class="bg-light p-3 border rounded">
        {{ $task->description }}
    </div>
    <div class="mt-4">
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary">بازگشت به لیست</a>
    </div>
</div>
@endsection
