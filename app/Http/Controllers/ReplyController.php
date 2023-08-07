<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function store(Request $request, $commentId)
    {
        $comment = Comment::findOrFail($commentId);
        $reply = new Reply();
        $reply->content = $request->input('content');
        // Any other fields you may need for replies (e.g., user_id)
        $comment->replies()->save($reply);

        return redirect()->back()->with('success', 'Reply posted successfully.');
    }
}

