<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermitStatusRequest;
use App\Models\PermitStatus;
use Illuminate\Http\Request;

class PermitStatusController extends Controller
{
    public function index()
    {
        $positions = PermitStatus::all();
        return view("user.modules.permitStatus.index.index", compact("positions"));
    }

    public function create()
    {
        return view("user.modules.permitStatus.create-update.index");
    }

    public function store(PermitStatusRequest $request)
    {
        $permitStatus = new PermitStatus();
        $permitStatus->name = $request->name;
        $permitStatus->description = $request->description;
        $permitStatus->status = $request->status != null ? 1 : 0;
        $permitStatus->save();
        return redirect()->route('user.permitStatus.index')->with('success', 'İzin türleri başarıyla oluşturuldu');

    }

    public function edit($id)
    {
        $permitStatus = PermitStatus::findOrfail($id);
        return view('user.modules.permitStatus.create-update.index', compact('permitStatus'));
    }

    public function update(PermitStatusRequest $request, $id)
    {
        $permitStatus = PermitStatus::findOrfail($id);
        $permitStatus->name = $request->name;
        $permitStatus->description = $request->description;
        $permitStatus->status = $request->status != null ? 1 : 0;
        $permitStatus->save();
        return redirect()->route('user.permitStatus.index')->with('success', 'İzin türleri başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'permitStatusID' => 'required|exists:permit_statuses,id',
        ]);
        $permitStatus = PermitStatus::find($request->permitStatusID);
        $permitStatus->delete();
        return response()->json(['status' => 'success']);
    }
}
