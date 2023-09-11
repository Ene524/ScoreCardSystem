<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermitTypeRequest;
use App\Models\PermitType;
use Illuminate\Http\Request;

class PermitTypeController extends Controller
{
    public function index()
    {
        $positions = PermitType::all();
        return view("user.modules.permitType.index.index", compact("positions"));
    }

    public function create()
    {
        return view("user.modules.permitType.create-update.index");
    }

    public function store(PermitTypeRequest $request)
    {
        $permitType = new PermitType();
        $permitType->name = $request->name;
        $permitType->description = $request->description;
        $permitType->day = $request->day;
        $permitType->status = $request->status != null ? 1 : 0;
        $permitType->save();
        return redirect()->route('user.permitType.index')->with('success', 'İzin türleri başarıyla oluşturuldu');

    }

    public function edit($id)
    {
        $permitType = PermitType::findOrfail($id);
        return view('user.modules.permitType.create-update.index', compact('permitType'));
    }

    public function update(PermitTypeRequest $request, $id)
    {
        $permitType = PermitType::findOrfail($id);
        $permitType->name = $request->name;
        $permitType->description = $request->description;
        $permitType->day = $request->day;
        $permitType->status = $request->status != null ? 1 : 0;
        $permitType->save();
        return redirect()->route('user.permitType.index')->with('success', 'İzin türleri başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'permitTypeID' => 'required|exists:permit_types,id',
        ]);
        $permitType = PermitType::find($request->permitTypeID);
        $permitType->delete();
        return response()->json(['status' => 'success']);
    }
}
