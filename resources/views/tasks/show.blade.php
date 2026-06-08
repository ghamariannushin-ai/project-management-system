@extends('layouts.app')

@section('content')
<div class="container">
    <h2>مشاهده تسک: {{ $task->title }}</h2>
    <div style="border: 1px solid #ddd; padding: 15px; border-radius: 5px;">
        <p><strong>پروژه:</strong> {{ $task->project->name }}</p>
        <p><strong>وضعیت:</strong> {{ $task->status }}</p>
        <p><strong>توضیحات:</strong> {{ $task->description }}</p>
    </div>
    <br>
    <a href="{{ route('tasks.index') }}" class="btn btn-primary">بازگشت به لیست</a>
</div>
@endsection
