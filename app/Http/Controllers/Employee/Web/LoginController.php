<?php

namespace App\Http\Controllers\Employee\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route("user.dashboard.index");
        } else {
            return view("employee.modules.authentication.login.index");
        }
    }

    public function login(LoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        !is_null($remember) ? $remember = true : $remember = false;

        $user = User::where("email", $email)->first();
        if ($user && \Hash::check($password, $user->password)) {
            Auth::login($user, $remember);
            return redirect()->route("user.dashboard.index");
        } else {
            return redirect()->route("user.login")->withErrors(["email" => "Bilgilerinizi kontrol ediniz."])->onlyInput("email", "remember");
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route("user.login");
        }
    }
}
