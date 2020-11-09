@extends('layout')
@section('content')
<div class="todo-contents">
    <nav class="sidebar">
        <ul class="project-list">
            @foreach($projects as $project)
            <li>{{$project->title}}</li>
            @endforeach
        </ul>
        <a href="{{route('projects.create')}}" class="add-project">
            <span>+</span>プロジェクトの追加
        </a>
    </nav>
    <section class="main-contents {{empty($firstProject) ? 'new-project-make' : ''}}">
        @if(empty($firstProject))
        <div class="create-msg">
            <p>{{Auth::user()->name}}さん、<br>まずはプロジェクトを作成してみましょう。</p>
            <a href="{{route('projects.create')}}">
                <button class="btn btn-secondary btn-lg">プロジェクトの追加</button>
            </a>
        </div>
        @else
        <div class="main-page">
            <!-- タスク数と未完了のタスク数を表示 -->
            <!-- 今は未実装 -->
            <!-- <div class="done-tasks">
                <div class="task-counter">
                    <h4 class="counter">{{$tasks->where('project_id', )->count()}}</h4>
                    <p>タスク数</p>
                </div>
                <div class="task-counter">
                    <h4 class="counter">{{$tasks->where('status', '1')->count()}}</h4>
                    <p>未完了のタスク数</p>
                </div>
            </div> -->
            <div class="add-task">
                <a href="{{route('tasks.create')}}">
                    <button type="button" class="btn btn-lg btn-block">タスクを追加する</button>
                </a>
            </div>
            <div class="tasks">
                @foreach($projects as $project)
                <div class="task-box">
                    <p class="task-title">{{$project->title}}</p>
                    @foreach($tasks as $task)
                    @if($project->id === $task->project_id)
                    <div class="task">
                        <div class="task-left">
                            <div class="importance {{$task->priority_class}}"></div>
                            <h5 class="title">{{$task->title}}</h5>
                        </div>
                        <!-- タスク完了時間 -->
                        <!-- 状態が完了であれば表示 -->
                        @if($task->status === 3)
                        <p>{{$task->task_time}}</p>
                        @endif
                        <div class="task-right">
                            <!-- 状態 -->
                            <a href="{{route('tasks.run', ['id' => $task->id])}}" class="status">
                                <span class="badge {{$task->status_class}}">{{$task->status_label}}</span>
                            </a>
                            <!-- 期限 -->
                            <p class="deadline">
                                {{$task->formatted_due_date}}まで
                            </p>
                            <!-- タスクの編集 -->
                            <a href="{{route('tasks.edit', ['id' => $task->id])}}">
                                <button type="button" class="btn btn-sm btn-outline-primary">編集</button>
                            </a>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>
</div>
@endsection