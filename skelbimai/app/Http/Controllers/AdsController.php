<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Ads;

class AdsController extends Controller
{
    public function addAd() {
        $categories = Category::all();
        return view("skelbimai.pages.addAd", compact("categories"));
    }

    public function storeAd(Request $request) {
        $validateData = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'email' => 'required',
        ]);

        $ad = Ads::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request("price"),
            'img' => request('image'),
            'location' => request('location'),
            'email' => request('email'),
            'phone' => request('phone'),
            'categoryId' => request("category"),
        ]);

        return redirect("/all-ads");
    }

    public function manageAds() {
        $ads = Ads::all();
        return view("skelbimai.pages.manageAds", compact("ads"));
    }

    public function deleteAd(Ads $ad) {
        $ad->delete();
        return redirect("/manage-ads");
    }
}
