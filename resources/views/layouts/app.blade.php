<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'داشبورد ادمین')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Basic Styling - Replace with your project's actual CSS */
        body { font-family: 'Tahoma', sans-serif; margin: 0; padding: 0; background-color: #f4f7f6; color: #333; }
        .container { max-width: 1200px; margin: 20px auto; padding: 20px; background-color: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 8px; }
        .header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 1px solid #eee; }
        .header h1 { margin: 0; color: #0056b3; }
        .nav-links a { margin-left: 15px; color: #007bff; text-decoration: none; font-weight: bold; }
        .nav-links a:hover { text-decoration: underline; }
        .logout-button { background-color: #dc3545; color: white; border: none; padding: 8px 15px; border-radius: 5px; cursor: pointer; font-size: 14px; }
        .logout-button:hover { background-color: #c82333; }
        .stats-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-bottom: 30px; }
        .stat-card { background-color: #e9ecef; padding: 20px; border-radius: 8px; text-align: center; }
        .stat-card h3 { margin-top: 0; color: #495057; font-size: 1.1em; }
        .stat-card p { font-size: 1.8em; font-weight: bold; color: #0056b3; margin-bottom: 0; }
        .latest-projects { margin-top: 30px; }
        .latest-projects h3 { color: #495057; border-bottom: 2px solid #007bff; padding-bottom: 10px; margin-bottom: 20px; }
        .latest-projects ul { list-style: none; padding: 0; }
        .latest-projects li { background-color: #f8f9fa; padding: 12px 15px; margin-bottom: 10px; border-radius: 5px; border-left: 4px solid #007bff; transition: background-color 0.2s ease; }
        .latest-projects li:hover { background-color: #e2e6ea; }
        .latest-projects strong { color: #0056b3; }
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
