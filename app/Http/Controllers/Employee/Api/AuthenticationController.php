<?php

namespace App\Http\Controllers\Employee\Api;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    use HttpResponse;

    public function login(Request $request)
    {
        $employee = Employee::where('email', $request->email)->first();
        if ($employee)
        {
            if ($employee->status = 1) {
                return $this->httpResponse('User logged in successfully', 200, [
                    'token' => $employee->createToken('employeeApiToken')->plainTextToken,
                    'id'=> $employee->id,
                    'name'=> $employee->full_name,
                    'email'=> $employee->email,
                ], true);
            } else {
                return $this->httpResponse('User is not activated', 401);
            }
        }
        else{
            return $this->httpResponse('User is not found', 401);

        }
    }



}
