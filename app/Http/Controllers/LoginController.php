<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        // $foo = session()->get('foo');
        if ($test = session('test')) {
            action($test);
        }

        session()->all();

        $foo = session('foo');

        // dd($foo);

        return view('login.index');
    }
    public function store(Request $request)
    {
        // $ip = $request->ip();
        // $path = $request->path();
        // $url = $request->url();
        // dd($ip, $path, $url);

        // $email = $request->input('email');
        // $password = $request->input('password');
        // $agreement = $request->boolean('agreement');

        // dd($email, $password, $agreement);
        // return response()->redirectToRoute('user');

        $session = session();

        // $session->put('foo', 'bar');
        // session(['foo' => 'Bar']);

        // dd($session);

        // session()->forget('foo');
        // session()->flush();


        alert(__('Welcome!'));

        return redirect()->route('user');
    }
}
