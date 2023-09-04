<?php

namespace App\Http\Controllers\Website;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Reply;
use Illuminate\Http\Request;

class CommentReplyController extends Controller
{
    public function addComment(Request $request)
    {
        if(Auth::id())
        {
            $comment= new Comment();

            $comment->name= Auth::user()->name;
            $comment->user_id= Auth::user()->id;
            $comment->comment= $request->comment;
            $comment->save();

            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

    public function addReply(Request $request)
    {
        if(Auth::id())
        {
            $reply=new Reply();

            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;
            $reply->save();

            return redirect()->back();
        }else
        {
            return redirect('login');
        }
    }
}
