<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function Register(Request $request)
    {
        return view('admin.users.register', [
            'title' => 'Register'
        ]);
    }

    public function action(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
        ]);
        $user->save();
        return redirect()->route('login');
    }

    public function logout()
    {

        Auth::logout();
        return redirect()->route('login');
    }
}
