@extends('layout')
@section('style')
@include('share.flatpickr.styles')
<link rel="stylesheet" href="{{asset('css/create.css')}}">
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
    <form action="{{route('tasks.create')}}" method="post" class="form-group">
        @csrf
        <div class="input-box">
            <label for="title" class="label-title">タイトル: </label>
            <input type="text" name="title" id="title" value="{{old('title')}}">
            <div class="text_underline"></div>
            <label for="due_date" class="label-title">期限: </label>
            <input type="text" name="due_date" id="due_date" value="{{old('due_date')}}">
            <div class="text_underline"></div>
            <label for="importance" class="label-title">重要度: </label>
            <div class="importance-btns">
                <input type="radio" name="importance" id="high" value="1" {{old('importance') == '1' ? 'checked' : ''}}><label for="high" class="high">高</label>
                <input type="radio" name="importance" id="mid" value="2" {{old('importance') == '2' ? 'checked' : ''}}><label for="mid" class="mid">中</label>
                <input type="radio" name="importance" id="low" value="3" {{old('importance') == '3' ? 'checked' : ''}}><label for="low" class="low">低</label>
            </div>
            <label for="project_id" class="label-title">プロジェクト名</label>
            <br>
            <select name="project_id" id="project_id">
                <option value="" selected>プロジェクトを選択</option>
                @foreach($projects as $project)
                    <option value="{{$project->id}}" {{old('project_id') == $project->id ? 'selected' : ''}}>{{$project->title}}</option>
                @endforeach
            </select>


        </div>
        <div class="btn-box">
            <a href="javascript:history.back()">
                <button type="button" class="btn btn-outline-primary back-btn">戻る</button>
            </a>
            <button type="submit" class="btn btn-outline-danger btn-enter">決定</button>
        </div>

    </form>
</div>

@endsection

@section('script')
@include('share.flatpickr.scripts')
@endsection
