@extends('layouts.admin')

@section('title', 'مدیریت پروژه‌ها')
@section('page-title', 'مدیریت پروژه‌ها')

@section('content')
<div class="card p-4">

    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary mb-3">
        + افزودن پروژه جدید
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
                    <th>نام پروژه</th>
                    <th>توضیحات</th>
                    <th>کاربر</th>
                    <th>عملیات</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $project->name }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($project->description, 80) }}</td>
                        <td>{{ $project->user->name ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                ویرایش
                            </a>

                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">
                                    حذف
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">پروژه‌ای یافت نشد.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $projects->links() }}
    </div>
</div>
@endsection
