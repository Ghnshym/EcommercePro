<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);
        $comment = new Comment();
        $comment->content = $request->content;
        $product->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
}

