<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Ads;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function storeComment(Request $request, Ads $ad) {
        $request->validate([
            'comment' => 'required'
        ]);

        Comment::create([
            'ads_id' => $ad->id,
            'userId' => Auth::id(),
            'name' => Auth::user()? Auth::user()->name: "Anonimas",
            'comment' => request('comment'),
        ]);

        return back();
    }
}
