{{-- این view به layout اصلی ارجاع می دهد --}}
@extends('layouts.admin')

{{-- عنوان این صفحه را مشخص می کند (که در layout با @yield('title') دریافت می شود) --}}
@section('title', 'داشبورد اصلی')

{{-- محتوای اصلی این صفحه که در @yield('content') در layout قرار می گیرد --}}
@section('content')

    <div class="stats-grid">
        <div class="stat-card">
            <h3>کل کاربران</h3>
            {{-- از ?? 0 برای مقدار پیشفرض در صورت نبود متغیر استفاده شده --}}
            <p>{{ $totalUsers ?? 0 }}</p>
        </div>
        <div class="stat-card">
            <h3>کل پروژه‌ها</h3>
            <p>{{ $totalProjects ?? 0 }}</p>
        </div>
        {{-- می توانید کارت های بیشتری اضافه کنید --}}
    </div>

    <div class="latest-projects">
        <h3>آخرین پروژه‌ها</h3>
        {{-- بررسی می کنیم که آیا متغیر $latestProjects تعریف شده و حداقل یک پروژه دارد --}}
        @if(isset($latestProjects) && $latestProjects->count() > 0)
            <ul>
                @foreach($latestProjects as $project)
                    <li>
                        <strong>{{ $project->name ?? 'نام پروژه نامشخص' }}</strong>
                        {{-- می توانید اطلاعات بیشتری از پروژه را نمایش دهید --}}
                        {{-- مثال: <br> تاریخ ایجاد: {{ $project->created_at->format('Y/m/d') }} --}}
                    </li>
                @endforeach
            </ul>
        @else
            <p>پروژه‌ی جدیدی ثبت نشده است.</p>
        @endif
    </div>

@endsection {{-- پایان سکتن content --}}
