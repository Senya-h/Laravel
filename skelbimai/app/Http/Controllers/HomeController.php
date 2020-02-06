<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view("skelbimai.pages.home");
    }

    public function ads() {
//        $darbuotojai = [
//            "Jonas",
//            "Petras",
//            "Antanas",
//            "Ieva"
//        ];
//
//        //dd($darbuotojai); //dumpas
        //return redirect("http://www.kitm.lt");

        return view('skelbimai.pages.all_ads'/*, compact('darbuotojai')*/);
    }

    public function about() {
        return view("skelbimai.pages.about");
    }

    public function contact() {
        return view("skelbimai.pages.contact");
    }

    public function blog() {
        return view("skelbimai.pages.blog");
    }

    public function login() {
        return view("skelbimai.pages.login");
    }

    public function register() {
        return view("skelbimai.pages.register");
    }

    public function ad() {
        return view("skelbimai.pages.ad");
    }

}
