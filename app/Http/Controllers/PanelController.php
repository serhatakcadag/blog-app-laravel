<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends Controller
{
    public static function index()
    {
        return view('panel.home');
    }
    public static function header()
    {
        $header = Setting::all();
       // dd($header);
        return view('panel.headersettings', ['header' => $header]);
    }
    public static function headerput(Request $req)
    {
       $setting = Setting::find('1');
       $formFields = $req->validate([
        'title' => 'required',
        'description' => 'required',
        'keywords' => 'required',
        'mail' => ['required', 'email']
       ]);
       $setting->update($formFields);
       return back()->with('message', 'Settings updated.');
    }

    public static function new()
    {
        return view('panel.newpost');
    }

    public static function show()
    {
        $posts = Post::all();
        return view('panel.showpost', ['posts' => $posts]);
    }

    public static function delete($id)
    {
        Post::destroy($id);
        return redirect('/admin/show')->with('message', 'Post deleted successfully.');
    }

    public static function edit($id)
    {
       $post = Post::find($id);
       return view('panel.editpost', ['post' => $post]);
    }

    public static function  update($id, Request $request)
    {
        $post = Post::find($id);
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

          $post->update($formFields);

         return redirect('/admin/show')->with('message', 'Listing updated successfully');

    }

    public static function login()
    {
        if(Auth::check())
        {
            return redirect('/admin');
        }
       return view('panel.login');
    }

    public static function authenticate(Request $request)
    {
        if(Auth::check())
        {
            return redirect('/admin');
        }
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);
        if (auth()->attempt($user)) {
           $request->session()->regenerate();

           return redirect('/admin');
        }
        else {
            return back()->with('message', 'Invalid credentials.');
        }
    }

    public static function register()
    {
        /* $user = new User();
         $password = bcrypt('123456');
         $user->name = "Deneme";
         $user->email = "deneme@deneme.com";
         $user->password = $password;
         $user->save(); */
    }

    public static function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
