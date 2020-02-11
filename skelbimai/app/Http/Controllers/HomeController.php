<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ads;
use App\Category;
use File;
use View;
use Illuminate\Support\Facades\Gate;
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

        $categories = Category::all();

        return view("skelbimai.pages.home", compact('ads', 'categories'));
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

    public function search(Request $request) {
        $ads = Ads::select("ads.id as id",
            "ads.name as title",
            "categories.name as category",
            "ads.location")
            ->join("categories", 'categoryId', '=', 'categories.id');

        if(request("search")) {
            $ads = $ads->where("ads.name", "LIKE", "%".request("search")."%");
        }

        if(request("location")) {
            $ads = $ads->where("ads.location", "LIKE", "%".request("location")."%");
        }

        if(request("categoryId")) {
            $ads = $ads->where("categoryId", "LIKE", "%".request("categoryId")."%");
        }

        $ads = $ads->paginate(4)->withPath($request->fullUrl());

        if(empty($ads)) {
            dd($ads);
        }

        return view("skelbimai.pages.allAds", compact('ads'));
    }

    public function ad(Ads $ad) {
        return view("skelbimai.pages.ad", compact('ad'));
    }

}
