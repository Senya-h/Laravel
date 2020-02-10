<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index() {
        $ads = Ads::select("ads.id as id",
                            "ads.name as title",
                            "categories.name as category",
                            "categories.id as categoryId",
                            "ads.location")
            ->join("categories", 'categoryId', '=', 'categories.id')->orderBy("ads.id", 'desc')->take(6)->get();

        return view("skelbimai.pages.home", compact('ads'));
    }

    public function allAds() {
        $ads = Ads::select("ads.id as id",
                            "ads.name as title",
                            "categories.name as category",
                            "ads.location")
            ->join("categories", 'categoryId', '=', 'categories.id')->paginate(4);

        return view('skelbimai.pages.allAds', compact('ads'));
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

    public function ad(Ads $ad) {
//        $ad = $ad->attributesToArray();

        return view("skelbimai.pages.ad", compact('ad'));
    }

}
