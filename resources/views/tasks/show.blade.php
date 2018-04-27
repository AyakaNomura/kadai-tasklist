@extends('layouts.app')

@section('content')

<h1>id = {{ $task->id }}のタスク詳細ページ</h1>
<!-- ここにページ毎のコンテンツを書く -->
<table class="table">
    <tr>
        <th>id</th>
        <td>{{ $task->id }}</td>
    </tr>
    <tr>
        <th>メッセージ</th>
        <td>{{ $task->content }}</td>
    </tr>
    <tr>
        <th>状態</th>
        <td>{{ $task->status }}</td>
    </tr>
</table>

{!! link_to_route('tasks.edit', 'このタスク編集', ['id' => $task->id], ['class'=> 'btn btn-info']) !!}

{!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
    {!! Form::submit('削除', ['class'=> 'btn btn-danger']) !!}
{!! Form::close() !!}

@endsection