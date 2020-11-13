<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1, 10) as $num) {
            DB::table('tasks')->insert([
                'project_id' => 6,
                'title' => "サンプル{$num}",
                'status' => $num,
                'due_date' => Carbon::now()->addDay($num),
                'priority' => $num,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'task_time' => '00:00:00',
            ]);
        }
    }
}
