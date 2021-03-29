<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        if(preg_match('/[^a-zA-Z0-9_]/', '', $request->username) !== false){
            session()->flash('warning', "Does not accept special characters except '_'");
        }

        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required',
            'phone_number' => 'required|unique:users',
        ]);

        User::create([
            'name' => trim($request->firstname . ' ' . $request->lastname),
            'email' => strtolower($request->email),
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number,
        ]);

        session()->flash('success', 'Your account is created');
        return redirect()->back();
    }
}
