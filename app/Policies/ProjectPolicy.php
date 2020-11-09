<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\Task;

class ProjectPolicy
{
    /**
     * フォルダの閲覧権限
     * @param User $user
     * @param Folder $folder
     * @return bool
     */
    public function view(Project $project, Task $task)
    {
        return $project->id === $task->project_id;
    }
}
