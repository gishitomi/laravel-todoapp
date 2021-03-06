<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class TaskController extends Controller
{
    public function index()
    {
        // ユーザーの全てのプロジェクトを取得
        $projects = Auth::user()->projects()->get();
        // プロジェクトがすでに入っているか確認
        $project = Auth::user()->projects()->first();

        // 全てのタスクを取得
        $tasks = Task::all();

        return view('tasks/index', [
            'projects' => $projects,
            'firstProject' => $project,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm()
    {
        $projects = Auth::user()->projects()->get();

        return view('tasks.create', [
            'projects' => $projects,
        ]);
    }

    public function create(CreateTask $request)
    {
        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;
        $task->priority = $request->importance;
        $task->project_id = $request->project_id;
        $task->task_time = '00:00:00';

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function showEditForm(int $id)
    {
        $projects = Auth::user()->projects()->get();
        $task = Task::find($id);
        if(is_null($task)) {
            abort(404);
        }

        return view('tasks.edit', [
            'projects' => $projects,
            'task' => $task,
        ]);
    }
    public function edit(int $id, EditTask $request)
    {
        // 選択中のタスクを取得
        $task = Task::find($id);
        $task->title = $request->title;
        $task->due_date = $request->due_date;
        $task->priority = $request->importance;
        $task->project_id = $request->project_id;

        $task->save();

        return redirect()->route('tasks.index');
    }
    public function showRunForm(int $id)
    {
        // $project = Project::find($project_id);
        $task = Task::find($id);
        if(is_null($task)) {
            abort(404);
        }
        if (Auth::user()->projects()->value('id') !== $task->project_id) {
            abort(403);
        }
        return view('tasks.run', [
            'task' => $task,
        ]);
    }
    public function run(int $id,  Request $request)
    {
        // 選択中のタスクを取得
        $task = Task::find($id);

        $task->task_time = $request->timer;
        $task->status = 3;

        $task->save();

        return redirect()->route('tasks.index');
    }
}
