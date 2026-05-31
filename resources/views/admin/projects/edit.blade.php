@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>ویرایش پروژه: {{ $project->name }}</h2>

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-3">
            <label>نام پروژه</label>
            <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}" required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group mb-3">
            <label>توضیحات</label>
            <textarea name="description" class="form-control" rows="5">{{ old('description', $project->description) }}</textarea>
            @error('description')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">ذخیره تغییرات</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">انصراف</a>
    </form>
</div>
@endsection
