<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rombel;
use App\Models\Rombels;

class Rombelcontroller extends Controller
{
    //
    public function index()
    {
        $rombels = Rombels::all();
        return view('rombel.index', compact('rombels'));
    }

    public function create()
    {
        return view('rombel.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $rombels = new Rombels;
        $rombels->name = $request->name;
        $rombels->save();

        return redirect()->route('rombel.index');
}

    public function show($id)
    {


}

    public function edit($id)
    {
        $rombel = Rombels::find($id);
        return view('rombel.edit', compact('rombel'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $rombel = Rombels::find($id);
        $rombel->name = $request->name;
        $rombel->save();
        return redirect()->route('rombel.index');
    }

    public function destroy($id)
    {
        $rombel = Rombels::find($id);
        $rombel->delete();
        return redirect()->route('rombel.index');
    }

}
