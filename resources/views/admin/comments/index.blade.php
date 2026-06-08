@extends('layouts.admin')

@section('title', 'مدیریت کامنت‌ها')
@section('page-title', 'مدیریت کامنت‌ها')

@section('content')
<div class="card p-4">
    <a href="{{ route('admin.comments.create') }}" class="btn btn-primary mb-3">
        + افزودن کامنت جدید
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>کاربر</th>
                    <th>تسک</th>
                    <th>متن کامنت</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($comments as $comment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $comment->user->name ?? 'ناشناس' }}</td>
                        <td>{{ $comment->task->title ?? 'بدون تسک' }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($comment->content, 50) }}</td>
                        <td>
                            <a href="{{ route('admin.comments.show', $comment->id) }}" class="btn btn-sm btn-info">مشاهده</a>
                            <a href="{{ route('admin.comments.edit', $comment->id) }}" class="btn btn-sm btn-warning">ویرایش</a>
                            <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST" style="display:inline-block;">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center">کامنتی یافت نشد.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
