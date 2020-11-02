<?php

namespace App\Http\Requests;

use App\Models\Task;
use Illuminate\Validation\Rule;

// 重複するところがあるので、CreateTaskから継承
class EditTask extends CreateTask
{
    // 継承されてるので、CreateTaskで記述したところに関しては、書かない

}
