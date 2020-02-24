<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Todo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos = Todo::select(
            "todo.id as id",
            "todo.subject as subject",
            "todo.priority as priority",
            "todo.dueDate as dueDate",
            "todo.status as status",
            "todo.percent as percent",
            "todo.updated_at as updated_at",
            "priorities.color as priorityColor"
        )->join("priorities", "priorities.id", "=", "todo.priorityId")->get();
        return view('todo.pages.home', compact('todos'));
    }
}

