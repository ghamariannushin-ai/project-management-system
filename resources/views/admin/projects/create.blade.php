<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ایجاد پروژه جدید</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <div class="container mx-auto max-w-2xl">
        <div class="bg-white p-8 rounded-xl shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">افزودن پروژه جدید</h1>

            {{-- نمایش خطاهای اعتبارسنجی --}}
            @if ($errors->any())
                <div class="bg-red-100 border-r-4 border-red-500 text-red-700 p-4 mb-6 rounded">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                {{-- انتخاب کاربر --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">اختصاص به کاربر</label>
                    <select name="user_id" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none">
                        <option value="" disabled selected>یک کاربر را انتخاب کنید...</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                {{ $user->name }} ({{ $user->email }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- نام پروژه --}}
                <div class="mb-5">
                    <label class="block text-sm font-medium text-gray-700 mb-2">نام پروژه</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                           placeholder="نام پروژه را وارد کنید">
                </div>

                {{-- توضیحات --}}
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">توضیحات</label>
                    <textarea name="description" rows="4"
                              class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-400 outline-none"
                              placeholder="توضیحات پروژه...">{{ old('description') }}</textarea>
                </div>

                {{-- دکمه‌ها --}}
                <div class="flex gap-4">
                    <button type="submit" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg transition">
                        ذخیره پروژه
                    </button>
                    <a href="{{ route('admin.projects.index') }}" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-bold py-3 px-4 rounded-lg text-center transition">
                        انصراف
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
