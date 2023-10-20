<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route("user.dashboard.index");
        } else {
            return view("user.modules.authentication.login.index");
        }
    }

    public function login(LoginRequest $request)
    {
        $user = User::where("email", $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user, $request->remember);
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
