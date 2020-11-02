@extends('layout')
@section('style')
<link rel="stylesheet" href="{{asset('css/create.css')}}">
<link rel="stylesheet" href="{{asset('css/run.css')}}">
@endsection
@section('content')
@if($errors->any())
<div class="error-box alert alert-danger">
    <ul>
        @foreach($errors->all() as $message)
        <li>{{$message}}</li>
        @endforeach
    </ul>
</div>
@endif
<div class="container create-card large-card">
    <form action="{{route('tasks.run', ['id' => $task->id])}}" method="post" class="form-group">
        @csrf
        <div class="input-box">
            <div class="task-header">
                <div class="task-header-left">
                    <div class="importance {{$task->priority_class}}"></div>
                    <p class="task-title">
                        {{$task->title}}
                    </p>
                </div>
                <div class="task-header-right">
                    <!-- 実行ボタン -->
                    <div id="start" class="run-active">
                    <i class="far fa-play-circle fa-lg run-btn"></i>
                    </div>
                    <!-- 停止ボタン -->
                    <div id="stop" class="hide">
                    <i class="far fa-pause-circle fa-lg run-btn"></i>
                    </div>
                    <!-- リセットボタン -->
                    <div id="reset">
                    <i class="far fa-stop-circle fa-lg run-btn"></i>
                    </div>
                    <!-- 完了ボタン -->
                    <div id="done">
                    <i class="far fa-check-circle run-btn fa-lg"></i>
                    </div>
                    <span class="badge status {{$task->status_class}}">{{$task->status_label}}</span>
                </div>
            </div>
        </div>
        <div class="timer-box">
            <div id="timer">00:00</div>
        </div>
        <div class="btn-box">
            <a href="{{route('tasks.index')}}">
                <button type="button" class="btn btn-outline-primary back-btn">戻る</button>
            </a>
            <button type="submit" class="btn btn-outline-danger btn-enter">終了</button>
        </div>

    </form>
</div>
@endsection

@section('script')
<script src="{{asset('js/timer.js')}}"></script>
@endsection