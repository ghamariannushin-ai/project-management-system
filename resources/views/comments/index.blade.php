@extends('layouts.app')

@section('content')
<div class="container">
    <h1>مدیریت کامنت‌ها</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('comments.create') }}" class="btn btn-primary">افزودن کامنت جدید</a>

    <table>
        <thead>
            <tr>
                <th>متن کامنت</th>
                <th>تسک مربوطه</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($comments as $comment)
                <tr>
                    <td>{{ Str::limit($comment->content, 50) }}</td>
                    <td>{{ $comment->task->title ?? 'نامشخص' }}</td>
                    <td>
                        <a href="{{ route('comments.show', $comment) }}" class="btn btn-success">نمایش</a>
                        <a href="{{ route('comments.edit', $comment) }}" class="btn btn-warning">ویرایش</a>

                        <form action="{{ route('comments.destroy', $comment) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">هیچ کامنتی ثبت نشده است.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
