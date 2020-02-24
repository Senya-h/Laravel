<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Category;
use App\Ads;

use File;

class AdsController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth', ['only' => [
//            'manageAds'
//        ]]);
        $this->middleware('auth');
    }


    public function addAd() {
        $categories = Category::all();
        return view("skelbimai.pages.addAd", compact("categories"));
    }

    public function storeAd(Request $request) {

        $request->validate([
            'categoryId' => 'required',
            'name' => 'required|max:255',
            'description' => 'required|max:3000',
            'location' => 'required',
            'email' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ]);

        $path = $request->file("image")->store("public/images");

        $fileName = str_replace("public/", "", $path);

        $ad = Ads::create([
            'name' => request('name'),
            'description' => request('description'),
            'price' => request("price"),
            'img' => $fileName,
            'location' => request('location'),
            'email' => request('email'),
            'phone' => request('phone'),
            'categoryId' => request("categoryId"),
            'userId' => Auth::id()
        ]);

        return redirect("/all-ads");
    }

    public function manageAds() {
        if(Auth::id() === 1) { //admin
            $ads = Ads::all();
        }  else {
            $ads = Ads::where("userId", Auth::id())->get();
        }
        return view("skelbimai.pages.manageAds", compact("ads"));
    }

    public function deleteAd(Ads $ad) {
        if(Gate::allows('edit-post', $ad)) {
            $ad->delete();
            return redirect("/manage-ads");
        }
        return redirect("/");
    }

    public function editAd(Ads $ad) {
        if(Gate::allows('edit-post', $ad)) {
            $categories = Category::all();

            return view("skelbimai.pages.editAd", compact(["ad", "categories"]));
        }
        return redirect("/");
    }

    public function saveEditedAd(Request $request, Ads $ad) {
            $request->validate([
                'categoryId' => 'required',
                'name' => 'required|max:255',
                'description' => 'required|max:3000',
                'location' => 'required',
                'email' => 'required',
                'img' => 'mimes:jpeg,jpg,png,gif|max:10000'
            ]);

            Ads::where("id", request('id'))->update($request->except(['_token', 'id', 'img']));

            if($request->hasFile('img')) {
                File::delete('../storage/app/public/' . $ad->img);
                $path = $request->file("img")->store("public/images");
                $fileName = str_replace("public/", "", $path);
                Ads::where('id', $ad->id)->update([
                    'img' => $fileName
                ]);
            }

            $message = "Pakeitimai sėkmingai išsaugoti!";
            return redirect("/manage-ads")->with('status', $message);
    }
}
