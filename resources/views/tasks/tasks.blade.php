@if(count($tasks) > 0)
<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>メッセージ</th>
            <th>状態</th>
        </tr>
    </thead>
    <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!}</td>
            <td>{{ $task->content }}</td>
            <td>{{ $task->status }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
