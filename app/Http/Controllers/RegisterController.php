<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }
    public function store(Request $request)
    {
        // $data = $request->all();
        // $data = $request->only(['name', 'email']);
        // $data = $request->except(['name', 'email']);

        $name = $request->input('name');
        $email = $request->input('email');
        // $remember = $request->input('remember');
        $password = $request->input('password');
        $remember = $request->boolean('remember');


        // $avatar = $request->file('avatar');
        // $request->has('name');
        // $request->filled('name');

        if ($name = $request->input('name')) {
            $name = strtoupper($name);
        }

        // dd($name, $email, $password, $remember);

        if (true) {
            return redirect()->back()->withInput();
        }


        return redirect()->route('user');
    }
}
