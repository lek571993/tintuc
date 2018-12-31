<?php

namespace App\Http\Controllers\backend;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
//use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin() {
        return view('backend.login.login');
    }
    public function postLogin(LoginRequest $request) {
//        dd('ấdsadsad');
        if (Auth::attempt(['username'=>$request->txtUser, 'password'=>$request->txtPass, 'level'=>1])) {
            echo "<script>
                alert('Đăng nhập thành công');
                window.location = '".route('admin.index')."'
            </script>";
        } else {
            return redirect()->back()->withErrors(['flash'=>'Kiểm tra lại Username hoặc Password']);
        }
    }

    public function getLogout() {
        Auth::logout();
        return redirect()->route('admin.getLogin');
    }
}
