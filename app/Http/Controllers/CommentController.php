<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $productId)
    {
        if(Auth::id())
        {

        $user = Auth::User();
        $username = $user->name;
        $product = Product::findOrFail($productId);
        $comment = new Comment();
        $comment->content = $request->content;
        $comment->name = $username;
        $product->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment posted successfully.');

        }
        else{
            return redirect('login');
        }
    }
}

