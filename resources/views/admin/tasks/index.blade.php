@extends('layouts.admin')

@section('title', 'مدیریت تسک‌ها')
@section('page-title', 'مدیریت تسک‌ها')

@section('content')
<div class="card p-4">

    <a href="{{ route('admin.tasks.create') }}" class="btn btn-primary mb-3">
        + افزودن تسک جدید
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>عنوان تسک</th>
                    <th>پروژه</th>
                    <th>وضعیت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tasks as $task)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->project->name ?? 'بدون پروژه' }}</td>
                        <td>{{ $task->status }}</td>
                        <td>
                            <a href="{{ route('admin.tasks.show', $task->id) }}" class="btn btn-sm btn-info">مشاهده</a>
                            <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">ویرایش</a>

                            <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">تسک‌ای یافت نشد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $tasks->links() }}
    </div>
</div>
@endsection
