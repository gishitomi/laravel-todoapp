@extends('layout')
@section('style')
<link rel="stylesheet" href="{{asset('css/create.css')}}">
@endsection
@section('content')
<div class="container create-card">
    @if($errors->any())
    <div class="error-box alert alert-danger">
        <ul>
            @foreach($errors->all() as $message)
            <li>{{$message}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('projects.create')}}" method="post" class="form-group">
        @csrf
        <div class="input-box">
            <label for="title">タイトル: </label>
            <input type="text" name="title" id="title" value="{{old('title')}}">
            <div class="text_underline"></div>
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