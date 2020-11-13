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
                    <div class="btns-box">
                        <!-- 実行ボタン -->
                        <div id="start" class="run-active">
                            <i class="far fa-play-circle fa-2x run-btn"></i>
                        </div>
                        <!-- 停止ボタン -->
                        <div id="stop" class="hide">
                            <i class="far fa-pause-circle fa-2x run-btn"></i>
                        </div>
                        <!-- リセットボタン -->
                        <div id="reset" class="">
                            <i class="far fa-stop-circle fa-2x run-btn"></i>
                        </div>
                        <!-- 完了ボタン -->
                        <div id="done" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="far fa-check-circle run-btn fa-2x"></i>
                        </div>
                    </div>
                    <div class="status-box">
                        <span class="badge status {{$task->status_class}}">{{$task->status_label}}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="timer-box">
            <div id="timer" name="timer">00:00:00</div>
        </div>
        <div class="btn-box">
            <a href="javascript:history.back()">
                <button type="button" class="btn btn-outline-primary back-btn">戻る</button>
            </a>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">タスクを完了しますか？</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        タスク完了までにかかった時間が記録されます。
                        <input type="hidden" id="task_time" name="timer">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                        <button type="submit" class="btn btn-primary">完了</button>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
@endsection

@section('script')
<script src="{{asset('js/timer.js')}}"></script>
@endsection