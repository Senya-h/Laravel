<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view("skelbimai.pages.home");
    }

    public function showProfile() {
        $darbuotojai = [
            "Jonas",
            "Petras",
            "Antanas",
            "Ieva"
        ];

        //dd($darbuotojai); //dumpas
        //return redirect("http://www.kitm.lt");

        return view('skelbimai.pages.profile', compact('darbuotojai'));
    }

}
