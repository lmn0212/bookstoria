<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function add(Request $request)
    {
        if(Auth::check()){
            if(isset($request) && !empty($request->comment) && !empty($request->book)){
                $comment = new Comment();
                $comment->text = $request->comment;
                $comment->book_id = $request->book;
                $comment->user_id = Auth::user()->id;
                $comment->save();
                return redirect()->back();
            }
        }else{
            return abort(403,'Access denied');
        }

    }
}
