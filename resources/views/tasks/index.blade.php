@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
    <h1>タスク一覧</h1>
    @include('tasks.tasks', ['tasks' => $tasks])
    {!! link_to_route('tasks.create', '新規タスクの投稿', null, ['class', 'btn btn-primary']) !!}
@endsection
