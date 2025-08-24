<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class HelloController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            $user = Auth::user();
            return view('hello.index', [
                'user' => $user,
            ]);
        }
        return redirect('/hello/login');
    }
    public function login()
    {
        return view('hello.login');
    }
    public function post(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        // if(Auth::attempt(['email'=>$email, 'password'=>$password], false))
        // {
        //     return redirect('/hello');
        // }
        // return redirect('/hello/login');
        $user = User::where('email', $email)->first();
        if($user)
        {
            if(Hash::check($password, $user->password))
            {
                Auth::login($user);
                return redirect('/hello');
            } else {
                return redirect('/hello/login');
            }
        } else {
            return redirect('/hello/login');
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/hello');
    }
    public function isuser(Request $request)
    {
        // User権限をチェックする
        if(Gate::allows('is-user', $request->user_id))
        {
            // User権限がある場合
            $result = "true";
        }
        else
        {
            // User権限が無い場合
            $result = 'false';
        }
        return "<html><body><h1>Is User: "
            . $result . "</h1></body></html>";
    }
    public function isadmin()
    {
        // Admin権限をチェックする
        if (Gate::allows('is-admin'))
        {
            // admin権限がある場合
            $result = "true";
        }
        else
        {
            // admin権限が無い場合
            $result = "false";
        }
        return "<html><body><h1>Is Admin: "
            . $result . "</h1></body></html>";
    }
}
