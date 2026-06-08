@extends('layouts.admin')

@section('title', 'داشبورد اصلی')

@section('content')

<div class="stats-grid">

    <div class="stat-card">
        <h3>کاربران</h3>
        <p>{{ $totalUsers ?? 0 }}</p>
    </div>

    <div class="stat-card">
        <h3>پروژه‌ها</h3>
        <p>{{ $totalProjects ?? 0 }}</p>
    </div>

    <div class="stat-card">
        <h3>تسک‌ها</h3>
        <p>{{ $totalTasks ?? 0 }}</p>
    </div>

    <div class="stat-card">
        <h3>کامنت‌ها</h3>
        <p>{{ $totalComments ?? 0 }}</p>
    </div>

</div>


<div class="dashboard-grid">

    <div class="dashboard-card">
        <h3>آخرین پروژه‌ها</h3>

        @if(isset($latestProjects) && $latestProjects->count())
            <ul>
                @foreach($latestProjects as $project)
                    <li>{{ $project->name }}</li>
                @endforeach
            </ul>
        @else
            <p>پروژه‌ای وجود ندارد</p>
        @endif
    </div>


    <div class="dashboard-card">
        <h3>آخرین تسک‌ها</h3>

        @if(isset($latestTasks) && $latestTasks->count())
            <ul>
                @foreach($latestTasks as $task)
                    <li>{{ $task->title }}</li>
                @endforeach
            </ul>
        @else
            <p>تسکی وجود ندارد</p>
        @endif
    </div>


    <div class="dashboard-card">
        <h3>آخرین کامنت‌ها</h3>

        @if(isset($latestComments) && $latestComments->count())
            <ul>
                @foreach($latestComments as $comment)
                    <li>{{ Str::limit($comment->content,50) }}</li>
                @endforeach
            </ul>
        @else
            <p>کامنتی وجود ندارد</p>
        @endif
    </div>

</div>


<a href="{{ route('home') }}" class="user-panel-btn">
    ورود به پنل کاربران
</a>

@endsection
