<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نمایش پروژه</title>
</head>
<body>
    <h1>جزئیات پروژه</h1>

    <p><strong>عنوان:</strong> {{ $project->name }}</p>
    <p><strong>توضیحات:</strong> {{ $project->description }}</p>

    <a href="{{ route('projects.index') }}">بازگشت</a>
</body>
</html>
