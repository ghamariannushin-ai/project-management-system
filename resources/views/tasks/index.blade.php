@extends('layouts.app')

@section('content')
<div class="container">
    <h1>مدیریت تسک‌ها</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tasks.create') }}" class="btn btn-primary">افزودن تسک جدید</a>

    <table>
        <thead>
            <tr>
                <th>عنوان</th>
                <th>پروژه</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
                <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->project->name ?? 'بدون پروژه' }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-success">نمایش</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">هیچ تسکی یافت نشد.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
