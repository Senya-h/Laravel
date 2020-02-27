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
        $this->middleware('auth');
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
}
