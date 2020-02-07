<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\Category;

class HomeController extends Controller
{
    public function index() {
        return view("skelbimai.pages.home");
    }

    public function allAds() {
        $ads = Ads::select("ads.id as id",
                            "ads.name as title",
                            "categories.name as category",
//                            "ads.description",
//                            "ads.price",
                            "ads.location")
//                            "ads.email",
//                            "ads.phone")
            ->join("categories", 'categoryId', '=', 'categories.id')->get();

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
        $ad = $ad->attributesToArray();

        return view("skelbimai.pages.ad", compact('ad'));
    }

}
