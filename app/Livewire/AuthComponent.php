<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class AuthComponent extends Component
{
    public $name, $email, $password, $loginName, $loginPassword;

    // Register User
    public function register()
    {
        $formData = $this->validate([
            'name' => ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:4', 'max:12']
        ]);

        $formData['password'] = bcrypt($this->password);
        $user = User::create($formData);
        Auth::login($user);
        return redirect('/');
    }

    // Login User
    public function login()
    {
        $formData = $this->validate([
            'loginName' => 'required',
            'loginPassword' => 'required'
        ]);

        if (Auth::attempt(['name' => $this->loginName, 'password' => $this->loginPassword])) {
            session()->regenerate();
            return redirect('/');
        } else {
            session()->flash('error', 'Invalid Credentials');
        }
    }

    // Logout User
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth-component');
    }
}
