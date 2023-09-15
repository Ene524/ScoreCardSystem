<?php

<<<<<<<< HEAD:app/Http/Controllers/User/Web/LoginController.php
namespace App\Http\Controllers\User\Web;
========
namespace App\Http\Controllers\Auth\User;
>>>>>>>> origin/master:app/Http/Controllers/Auth/User/LoginController.php

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route("user.dashboard.index");
        } else {
<<<<<<<< HEAD:app/Http/Controllers/User/Web/LoginController.php
            return view("user.modules.authentication.login.index");
========
            return view("auth.user.modules.login.index");
>>>>>>>> origin/master:app/Http/Controllers/Auth/User/LoginController.php
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
