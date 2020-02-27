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
            "todos.id as id",
            "todos.subject as subject",
            "todos.priorityId as priorityId",
            "todos.dueDate as dueDate",
            "todos.statusId as statusId",
            "todos.percent as percent",
            "todos.updated_at as updated_at",
            "priorities.color as priorityColor",
            "priorities.name as priorityName",
            "statuses.name as statusName"
        )->join("priorities", "priorities.id", "=", "todos.priorityId")
        ->join("statuses", "statuses.id", "=", "todos.statusId")->get();

        return view('todo.pages.home', compact('todos'));
    }
}

