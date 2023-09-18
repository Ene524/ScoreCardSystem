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
        $employee = Employee::where("email", $request->email)->first();

        if ($employee && \Hash::check($request->password, $employee->password)) {
            Auth::guard('employee')->login($employee, $request->remember);
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
