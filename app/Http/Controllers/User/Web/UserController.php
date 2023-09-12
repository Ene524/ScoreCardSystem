<?php

namespace App\Http\Controllers\User\Web;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view("user.modules.user.index.index", compact("users"));
    }

    public function create()
    {
        return view("user.modules.user.create-update.index");
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->status = $request->status != null ? 1 : 0;
        $user->save();
        return redirect()->route('user.user.index')->with('success', 'Kullanıcı başarıyla oluşturuldu');
    }

    public function edit($id)
    {
        $user = User::findOrfail($id);
        return view('user.modules.user.create-update.index', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::findOrfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->email_verified_at = now();
        $user->status = $request->status != null ? 1 : 0;
        $user->save();
        return redirect()->route('user.user.index')->with('success', 'Kullanıcı başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'userID' => 'required|exists:users,id',
        ]);
        $user = User::find($request->userID);
        $user->delete();
        return response()->json(['status' => 'success']);
    }
}
