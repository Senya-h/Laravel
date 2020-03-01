<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Priority;
use App\Status;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('api_getAllTodos');
    }

    public function addTodoForm() {
        $priorities = Priority::all();
        $statuses = Status::all();
        return view("todo.pages.addTodo", compact("priorities", "statuses"));
    }

    public function addTodo(Request $request) {
        $request->validate([
            'subject' => 'required|max:255',
            'priority' => 'required',
            'dueDate' => 'required',
            'status' => 'required',
            'percent' => 'required|min:0|max:100|integer'
        ]);

        Todo::create([
            'subject' => request('subject'),
            'priorityId' => request('priority'),
            'dueDate' => request('dueDate'),
            'statusId' => request('status'),
            'percent' => request('percent'),
            'userId' => Auth::id()
        ]);

        return redirect('/');
    }

    public function editTodoForm($id) {
        $todo = Todo::where("id", $id)->get()[0];
        $priorities = Priority::all();
        $statuses = Status::all();
        return view("todo.pages.editTodo", compact('todo', 'priorities', 'statuses'));
    }

    public function editTodo($id, Request $request) {
        Todo::where("id", $id)->update($request->except(['_token', 'id']));
        return redirect("/");
    }

    public function removeTodo($id) {
        Todo::where("id", $id)->delete();
        return redirect("/");
    }

    public function api_getAllTodos() {
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
        return response($todos, 200);
    }
}
