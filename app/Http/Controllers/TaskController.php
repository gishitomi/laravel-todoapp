<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // 全てのプロジェクトを取得
        $projects = Project::all();

        // 全てのタスクを取得
        $tasks = Task::all();

        return view('tasks/index', [
            'projects' => $projects,
            'tasks' => $tasks,
        ]);
    }

    public function showCreateForm()
    {
        $projects = Project::all();

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

        $task->save();

        return redirect()->route('tasks.index');
    }

    public function showEditForm(int $id)
    {
        $projects = Project::all();
        $task = Task::find($id);

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
        $task = Task::find($id);
        return view('tasks.run', [
            'task' => $task,
        ]);
    }
}
