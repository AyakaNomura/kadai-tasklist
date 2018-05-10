<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Task;    // 追加
use App\User;

class TasksController extends Controller
{
    // getでmessages/にアクセスされた場合の「一覧表示処理」
    public function index()
    {
        
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasklists()->get();
            
            return view('tasks.index', [
                'tasks' => $tasks,
                ]);
        }else{
            return view('welcome');
        }
    }

    // getでmessages/createにアクセスされた場合の「新規登録画面表示処理」
    public function create()
    {
        $task = new Task;
        
        return view('tasks.create', [
            'task' => $task,
            ]);
    }

    // postでmessages/にアクセスされた場合の「新規登録処理」
    public function store(Request $request)
    {
        $this->validate($request, [
            'status' => 'required|max:10',
            ]);
            
        $request->user()->tasklists()->create([
            'content' => $request->content,
            'status' => $request->status,
            'user_id' => $request->user()->id,
            ]);
        
        return redirect('/');
    }

    // getでmessages/idにアクセスされた場合の「取得表示処理」
    public function show($id)
    {
        $task = Task::find($id);
        
        return view('tasks.show', [
            'task' => $task,
            ]);
    }

    // getでmessages/id/editにアクセスされた場合の「更新画面表示処理」
    public function edit($id)
    {
        $user = \Auth::user();
        $task = Task::find($id);
        if ($user->id === $task->user_id) {
            return view('tasks.edit', [
                'task' => $task,
                ]);
        }else{
            return redirect('/');
        }
    }

    // putまたはpatchでmessages/idにアクセスされた場合の「更新処理」
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'required|max:10',
            ]);
            
        $task = Task::find($id);
        $user = \Auth::user();
        if ($user->id === $task->user_id) {
            $task->status = $request->status;
            $task->content = $request->content;
            $task->save();
        }
        
        return redirect('/');
    }

    // deleteでmessages/idにアクセスされた場合の「削除処理」
    public function destroy($id)
    {
        $task = Task::find($id);
        $user = \Auth::user();
        if ($user->id === $task->user_id) {
            $task->delete();
        }
        
        return redirect('/');
    }
}
