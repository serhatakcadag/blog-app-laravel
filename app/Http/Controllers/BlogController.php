<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Setting;
use Illuminate\Http\Request;

class BlogController extends Controller
{
   public static function index(Request $request)
   {
     // dd(request());
      $posts = Post::latest()->filter(request(['categories','search']))->paginate(2);
      return view('blog.index', ['posts' => $posts, 'search' => $request->search]);
   }
   public static function getsettings()
   {
    $setting = Setting::find(1);
    return $setting;
   }
   public static function show($id)
   {
      $post = Post::find($id);
      $comments = Comment::all()->where('post_id', $id);
      if ($post) {
     return view('blog.show', ['post' => $post, 'id' => $id, 'comments' => $comments]);
      }
      else
      {
        abort('404');
      }

   }
}
