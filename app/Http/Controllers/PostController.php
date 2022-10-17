<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function store(Request $request)
    {

       $formFields = $request->validate(
        ['title' => 'required',
         'author' => 'required',
         'categories' => 'required',
         'content' => 'required'
        ]

       );

       if ($request->hasFile('photo'))
       {
       // dd($request);
        $formFields['photo'] = $request->file('photo')->store('photos', 'public');
       }

      Post::create($formFields);

       return redirect('/admin/new')->with('message', 'Post created successfully');
    }

}
