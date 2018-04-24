@extends('layouts.app')

@section('content')

<!-- ここにページ毎のコンテンツを書く -->
<h1>id = {{ $task->id }}のタスク詳細ページ</h1>
<p>メッセージ: {{ $task->content }}</p>
<p>状態: {{ $task->status }}</p>
{!! link_to_route('tasks.edit', 'このタスク編集', ['id' => $task->id]) !!}

{!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除') !!}
{!! Form::close() !!}

@endsection