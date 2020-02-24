<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Status;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        $statuses = Status::all();
        return view("todo.pages.manageStatuses", compact('statuses'));
    }

    public function addStatusForm() {
        return view("todo.pages.addStatus");
    }

    public function addStatus(Request $request) {
        $request->validate([
            'status' => 'required'
        ]);

        Status::create([
            'name' => request('status')
        ]);

        return redirect("/manage/statuses");
    }

    public function removeStatus($id) {
        Status::where("id", $id)->delete();
        return redirect("/manage/statuses");
    }

}
