<?php

namespace App\Http\Controllers\User\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::all();
        return view("user.modules.position.index.index", compact("positions"));
    }

    public function create()
    {
        return view("user.modules.position.create-update.index");
    }

    public function store(PositionRequest $request)
    {
        $position = new Position();
        $position->name = $request->name;
        $position->description = $request->description;
        $position->status = $request->status != null ? 1 : 0;
        $position->save();
        return redirect()->route('user.position.index')->with('success', 'Pozisyon başarıyla oluşturuldu');

    }

    public function edit($id)
    {
        $position = Position::findOrfail($id);
        return view('user.modules.position.create-update.index', compact('position'));
    }

    public function update(PositionRequest $request, $id)
    {
        $position = Position::findOrfail($id);
        $position->name = $request->name;
        $position->description = $request->description;
        $position->status = $request->status != null ? 1 : 0;
        $position->save();
        return redirect()->route('user.position.index')->with('success', 'Pozisyon başarıyla güncellendi');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'positionID' => 'required|exists:positions,id',
        ]);
        $position = Position::find($request->positionID);
        $position->delete();
        return response()->json(['status' => 'success']);
    }
}
