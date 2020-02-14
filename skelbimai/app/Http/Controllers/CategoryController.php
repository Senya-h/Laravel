<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => [
            'addCategory',
            'storeCategory',
            'deleteCategory',
            'showCategories'
        ]]);
    }

    public function addCategory() {
        return view("skelbimai.pages.addCategory");
    }

    public function storeCategory(Request $request) {
        $validateData = $request->validate([
            'name' => 'required'
        ]);

        $category = Category::create([
            'name' => request('name'),
        ]);

        return redirect("/manage-categories");
    }

    public function showCategories() {
        $categories = Category::all();
        if(Auth::id())
        return view("skelbimai.pages.manageCategories", compact("categories"));
    }

    public function deleteCategory(Category $category) {
        $category->delete();
        return redirect("/manage-categories");
    }
}
