<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت پروژه‌ها</title>
    <style>
        body { font-family: tahoma; background: #f8f9fa; padding: 20px; }
        .container { max-width: 1000px; margin: auto; background: white; padding: 20px; border-radius: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #f1f1f1; }
        .btn { padding: 8px 12px; border-radius: 6px; text-decoration: none; color: white; }
        .btn-primary { background: #0d6efd; }
        .btn-success { background: #198754; }
        .btn-warning { background: #ffc107; color: black; }
        .btn-danger { background: #dc3545; }
        .alert-success { background: #d1e7dd; padding: 10px; border-radius: 6px; margin-bottom: 15px; }
    </style>
</head>
<body>
<div class="container">
    <h1>مدیریت پروژه‌ها</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('projects.create') }}" class="btn btn-primary">افزودن پروژه جدید</a>

    <table>
        <thead>
            <tr>
                <th>عنوان</th>
                <th>توضیحات</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-success">نمایش</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning">ویرایش</a>

                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('آیا مطمئن هستید؟')">حذف</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">هیچ پروژه‌ای ثبت نشده است.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $projects->links() }}
    </div>
</div>
</body>
</html>
