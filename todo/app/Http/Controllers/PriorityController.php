<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Priority;
class PriorityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $priorities = Priority::all();
        return view("todo.pages.managePriorities", compact('priorities'));
    }

    public function addPriorityForm() {
        return view("todo.pages.addPriority");
    }

    public function addPriority(Request $request) {
        $request->validate([
            'priority' => 'required',
            'color' => 'required'
        ]);

        Priority::create([
            'name' => request('priority'),
            'color' => request('color')
        ]);

        return redirect("/manage/priorities");
    }

    public function removePriority($id) {
        Priority::where("id", $id)->delete();
        return redirect("/manage/priorities");
    }
}
