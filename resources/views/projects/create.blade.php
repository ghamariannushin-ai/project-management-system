<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>افزودن پروژه</title>
</head>
<body>
    <h1>افزودن پروژه جدید</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.store') }}" method="POST">
    @csrf
    <div>
        <label>عنوان:</label>
        <!-- تغییر نام از title به name -->
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        <label>توضیحات:</label>
        <textarea name="description">{{ old('description') }}</textarea>
    </div>

    <button type="submit">ذخیره</button>
</form>

</body>
</html>
