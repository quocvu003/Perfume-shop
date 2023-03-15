<?php

namespace App\Http\Controllers\Admin\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Login'
        ]);
    }
    public function store(Request $request)
    {



        # kiểm tra có rỗng hay không
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);
        # kiểm tra có trong data hay không
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ], $request->input('remember'))) {
            return redirect()->route('admin');
        }
        Session::flash('error', 'Email hoặc mật khẩu không đúng ');
        return redirect()->back();
    }
}
