@extends('layout')
@section('content')
<div class="todo-contents">
    <nav class="sidebar">
        <ul class="project-list">
        </ul>
        <a href="{{route('projects.create')}}" class="add-project">
            <span>+</span>プロジェクトの追加
        </a>
    </nav>
    <section class="main-contents new-create">

    </section>
</div @endsection