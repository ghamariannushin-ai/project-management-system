<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'پنل ادمین')</title>

    {{-- Bootstrap RTL --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700;800&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Vazirmatn', sans-serif;
            background: #f5f7fb;
        }

        .admin-sidebar {
            min-height: 100vh;
            background: #1e293b;
            color: #fff;
            padding: 20px 0;
        }

        .admin-sidebar .brand {
            font-size: 20px;
            font-weight: 700;
            padding: 0 20px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            margin-bottom: 15px;
        }

        .admin-sidebar a {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            display: block;
            padding: 12px 20px;
            transition: 0.2s;
        }

        .admin-sidebar a:hover,
        .admin-sidebar a.active {
            background: rgba(255,255,255,0.08);
            color: #fff;
        }

        .admin-topbar {
            background: #fff;
            border-bottom: 1px solid #e5e7eb;
            padding: 15px 20px;
        }

        .content-wrapper {
            padding: 24px;
        }

        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(15, 23, 42, 0.06);
        }
    </style>

    @stack('styles')
</head>
<body>

<div class="container-fluid">
    <div class="row">

        {{-- Sidebar --}}
        <aside class="col-md-3 col-lg-2 admin-sidebar">
            <div class="brand">
                داشبورد ادمین
            </div>

            <nav>
                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    خانه
                </a>

                <a href="{{ route('admin.projects.index') }}"
                   class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">
                    مدیریت پروژه‌ها
                </a>

                <a href="{{ route('admin.comments.index') }}"
                   class="{{ request()->routeIs('admin.comments.*') ? 'active' : '' }}">
                    مدیریت کامنت‌ها
                </a>

                <a href="{{ route('admin.tasks.index') }}"
                   class="{{ request()->routeIs('admin.tasks.*') ? 'active' : '' }}">
                    مدیریت تسک‌ها
                </a>

                <a href="{{ route('home') }}">
                    بازگشت به سایت
                </a>

                <form action="{{ route('logout') }}" method="POST" class="px-3 mt-3">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger w-100">
                        خروج از حساب
                    </button>
                </form>
            </nav>
        </aside>

        {{-- Main content --}}
        <main class="col-md-9 col-lg-10 p-0">
            <div class="admin-topbar d-flex justify-content-between align-items-center">
                <div>
                    <strong>@yield('page-title', 'پنل مدیریت')</strong>
                </div>
                <div class="text-muted">
                    {{ auth()->user()->name ?? 'کاربر' }}
                </div>
            </div>

            <div class="content-wrapper">
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </div>
        </main>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@stack('scripts')
</body>
</html>
