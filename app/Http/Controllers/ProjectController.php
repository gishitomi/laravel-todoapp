<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProject;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function showCreateForm() 
    {
        return view('projects/create');
    }
    public function create(CreateProject $request)
    {
        $project = new Project();
        $project->title = $request->title;
        $project->save();

        // 画面を再描画する必要がない場合はredirect()を使う
        return redirect()->route('tasks.index');
    }
}
