<?php

namespace App\Http\Controllers\Employee\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Employee\EmployeeLoginRequest;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route("employee.dashboard.index");
        } else {
            return view("employee.modules.authentication.login.index");
        }
    }

    public function login(EmployeeLoginRequest $request)
    {
        $email = $request->email;
        $password = $request->password;
        $remember = $request->remember;

        !is_null($remember) ? $remember = true : $remember = false;

        $employee = Employee::where("email", $email)->first();
        if ($employee && \Hash::check($password, $employee->password)) {
            Auth::login($employee, $remember);
            return redirect()->route("employee.dashboard.index");
        } else {
            return redirect()->route("employee.login")->withErrors(["email" => "Bilgilerinizi kontrol ediniz."])->onlyInput("email", "remember");
        }
    }

    public function logout(Request $request)
    {
        if (Auth::check()) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            return redirect()->route("employee.login");
        }


    }
}
