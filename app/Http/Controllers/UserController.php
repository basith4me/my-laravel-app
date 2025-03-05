<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    //login function

    public function login(Request $request)
    {
        $formData = $request->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);
        if (auth()->attempt(['name' => $formData['loginName'], 'password' => $formData['loginPassword']])) {
            $request->session()->regenerate();
        }
        return redirect('/');
    }
    // logout function
    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

    //register and login function
    public function register(Request $request)
    {
        $formData = $request->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4', 'max:12']
        ]);
        $formData['password'] = bcrypt($formData['password']);  //hashing password
        $user = User::create($formData); //insert to User table
        auth()->login($user);
        return redirect('/');

    }
}
