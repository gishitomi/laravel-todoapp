<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        // タスク一覧にリダイレクトする
        return redirect()->route('tasks.index');
    }
}
