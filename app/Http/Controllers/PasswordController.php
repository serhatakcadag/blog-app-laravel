<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public static function forgot()
    {
       return view('panel.forgot');
    }
    public static function send(Request $request)
    {
      // DB::table('password_resets')->delete();
       $token = Str::random(64);
       $formFields = $request->validate(
       [
        'email' => ['required', 'email' ,'exists:users,email']
       ]
       );
       $formFields['token'] = $token;
       $formFields['created_at'] = Carbon::now();
       DB::table('password_resets')->insert($formFields);

       Mail::send('panel.mailcontent', ['token' => $token], function($message) use($request){
        $message->to($request->email);
        $message->subject('Reset Password');
      });

       return back()->with('message', 'Email sent.');
    }

    public static function reset($token)
    {
       $row = DB::table('password_resets')->where('token', $token)->first();

       if($row != null)
       {
        $totalDuration = Carbon::now()->diffInSeconds($row->created_at);
        if($totalDuration > 600)
         {
          DB::table('password_resets')->where('token', $token)->delete();
          return view('panel.reset', ['message' => 'Token expired.']);
         }
       }

         return view('panel.reset', ['token' => $token]);
    }

    public static function update(Request $request)
    {
        $formFields = $request->validate(
          [
            'password' => ['required', 'confirmed']
          ]
          );

        $password = bcrypt($request->password);
        $find = DB::table('password_resets')->where('token', $request->token)->first();
        $user = User::where('email', $find->email)->first();
        $user->password = $password;
        $user->save();

        return redirect('/admin/login');
    }
}
