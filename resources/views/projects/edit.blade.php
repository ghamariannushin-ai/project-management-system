<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>ویرایش پروژه</title>
</head>
<body>
    <h1>ویرایش پروژه</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label>عنوان:</label>
            <input type="text" name="name" value="{{ old('title', $project->name) }}">
        </div>

        <div>
            <label>توضیحات:</label>
            <textarea name="description">{{ old('description', $project->description) }}</textarea>
        </div>

        <button type="submit">بروزرسانی</button>
    </form>
</body>
</html>
