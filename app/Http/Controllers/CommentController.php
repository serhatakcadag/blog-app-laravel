<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public static function store(Request $request)
    {
         $formFields = $request->validate(
            [
                'author' => 'required',
                'content' => 'required'
            ]
            );

        $formFields['post_id'] = $request->id;
        Comment::create($formFields);

        return back()->with('message', 'Comment posted.');
    }
}
