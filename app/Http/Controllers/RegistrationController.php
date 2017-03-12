<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Mail\Welcome;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }
    public function store()
    {
        //validate the form
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
            ]);
        //create and save the user
        //$user = User::create(request(['name', 'email', 'password']));
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password'))
        ]);
        //sign theim in
        auth()->login($user);

        \Mail::to($user)->send(new Welcome($user));
        //redirect to home page
        return redirect()->home();
    }
}
