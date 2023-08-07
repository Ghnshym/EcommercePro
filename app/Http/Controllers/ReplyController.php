<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function store(Request $request, $commentId)
    {   
        $user = Auth::User();
        $username = $user->name;
        $comment = Comment::findOrFail($commentId);
        $reply = new Reply();
        $reply->content = $request->input('content');
        $reply->name = $username;
        $comment->replies()->save($reply);

        return redirect()->back()->with('success', 'Reply posted successfully.');
    }
}

