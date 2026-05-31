<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>صفحه اصلی</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="container mx-auto max-w-4xl">

        {{-- بخش اطلاعات کاربری --}}
        <div class="bg-white p-6 rounded-xl shadow-lg mb-8 border-b-4 border-gray-300">
            <h1 class="text-2xl font-bold mb-4">به پنل خوش آمدید!</h1>
            @if (session('success'))
                <div class="bg-green-100 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
            @endif

            @auth
                <div class="flex justify-between items-center">
                    <p class="text-gray-700">سلام، <strong>{{ Auth::user()->name }}</strong> عزیز! خوش آمدید.</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-1 px-4 rounded text-sm">خروج</button>
                    </form>
                </div>
            @else
                <div class="flex gap-2">
                    <a href="{{ route('login') }}" class="bg-blue-600 text-white py-2 px-6 rounded">ورود</a>
                    <a href="{{ route('register') }}" class="bg-gray-600 text-white py-2 px-6 rounded">ثبت نام</a>
                </div>
            @endauth
        </div>

        @auth
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

            {{-- پنل مدیریت (ادمین) --}}
            @if (Auth::user()->isAdmin())
            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-red-500">
                <h2 class="text-xl font-bold mb-4 text-red-600 flex items-center">
                    <span class="mr-2">🛡️</span> بخش مدیریت (ادمین)
                </h2>
                <div class="bg-red-50 p-4 rounded-lg">
                    <a href="{{ route('admin.dashboard') }}" class="block text-red-700 font-semibold hover:underline">
                        ورود به داشبورد مدیریتی
                    </a>
                </div>
            </div>
            @endif

            {{-- پنل کاربران عمومی --}}
            <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-blue-500">
                <h2 class="text-xl font-bold mb-4 text-blue-600 flex items-center">
                    <span class="mr-2">👤</span> پنل کاربری
                </h2>
                <div class="space-y-3">
                    <a href="{{ route('projects.index') }}" class="flex justify-between items-center bg-blue-50 p-3 rounded-lg hover:bg-blue-100 transition">
                        <span>پروژها </span>
                        <span class="bg-blue-200 text-blue-800 py-1 px-2 rounded-full text-xs">{{ $projectCount ?? 0 }}</span>
                    </a>
                    <a href="{{ route('tasks.index') }}" class="flex justify-between items-center bg-blue-50 p-3 rounded-lg hover:bg-blue-100 transition">
                        <span>تسک‌ها</span>
                        <span class="bg-blue-200 text-blue-800 py-1 px-2 rounded-full text-xs">{{ $taskCount ?? 0 }}</span>
                    </a>
                    <a href="{{ route('comments.index') }}" class="flex justify-between items-center bg-blue-50 p-3 rounded-lg hover:bg-blue-100 transition">
                        <span>کامنت‌ها</span>
                        <span class="bg-blue-200 text-blue-800 py-1 px-2 rounded-full text-xs">{{ $commentCount ?? 0 }}</span>
                    </a>
                </div>
            </div>

        </div>
        @endauth

    </div>
</body>
</html>
