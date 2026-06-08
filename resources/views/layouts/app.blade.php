<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'داشبورد ادمین')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
        /* استایل‌های قبلی شما */
        body { font-family: 'Tahoma', sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; color: #333; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .header h1 { margin: 0; color: #0056b3; }
        .nav-links a { margin-left: 15px; color: #007bff; text-decoration: none; font-weight: bold; }
        .nav-links a:hover { text-decoration: underline; }
        .logout-button { background-color: #dc3545; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-size: 14px; }

        /* استایل‌های جدید برای جدول‌ها (برای صفحه تسک‌ها) */
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { padding: 12px; text-align: right; border-bottom: 1px solid #ddd; }
        table th { background-color: #f8f9fa; }

        /* استایل‌های جدید برای دکمه‌ها */
        .btn { padding: 8px 12px; border-radius: 4px; text-decoration: none; display: inline-block; font-size: 14px; border: none; cursor: pointer; }
        .btn-primary { background-color: #007bff; color: white; }
        .btn-success { background-color: #28a745; color: white; }
        .btn-warning { background-color: #ffc107; color: #000; }
        .btn-danger { background-color: #dc3545; color: white; }

        /* استایل‌های فرم */
        form input, form select, form textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
    </style>

</head>
<body>
    <div class="container">
        <div class="header">
            <h1>داشبورد مدیر</h1>
            <div class="nav-links">
                <a href="{{ route('home') }}">صفحه اصلی</a>
                <a href="{{ route('projects.index') }}">مدیریت پروژه‌ها</a>
                <a href="{{ route('comments.index') }}">مدیریت کامنت‌ها</a>
                <a href="{{ route('tasks.index') }}">مدیریت تسک‌ها</a>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="logout-button">خروج</button>
                </form>
            </div>
        </div>

        {{-- اینجا محتوای اصلی هر صفحه قرار می گیرد --}}
        <main>
            @yield('content')
        </main>

        <footer>
            <p style="text-align:center; margin-top: 30px; color: #6c757d;">&copy; {{ date('Y') }} سیستم مدیریت پروژه</p>
        </footer>
    </div>

    {{-- Javascript Files --}}
    {{-- می توانید لینک فایل های Javascript خود را در اینجا اضافه کنید --}}
</body>
</html>
