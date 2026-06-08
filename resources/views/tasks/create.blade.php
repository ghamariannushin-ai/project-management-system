@extends('layouts.app')

@section('content')
<div class="container">
    <h2>ایجاد تسک جدید</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 10px;">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label>انتخاب پروژه:</label>
            <select name="project_id" style="width: 100%; padding: 8px;">
                @foreach($projects as $project)
                    <option value="{{ $project->id }}">{{ $project->name }}</option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>عنوان تسک:</label>
            <input type="text" name="title" style="width: 100%; padding: 8px;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label>توضیحات:</label>
            <textarea name="description" style="width: 100%; padding: 8px;"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره تسک</button>
    </form>
</div>
@endsection
