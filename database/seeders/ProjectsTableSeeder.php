<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // usersテーブルの1行目を取得
        $user = DB::table('users')->first();

        $titles = ['旅行', 'アルバイト', '勉強'];

        foreach($titles as $item) {
            DB::table('projects')->insert([
                'title' => $item,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'user_id' => $user->id,
            ]);
        }
    }
}
