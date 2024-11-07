<?php

namespace App\Http\Controllers;
use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Rombel;
use App\Models\Rombels;

class StudentController extends Controller
{
    //
    public function index(): View
    {
        $students = Students::all();

        return view('student.index', compact('students'));
    }


    public function create()
    {

        $rombels = Rombels::all();
        return view('student.create', compact('rombels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rombel_id' => 'required',
            'gender' => 'required',
            'nis' => 'required',
        ]);

        $students = new Students;
        $students->name = $request->name;
        $students->rombel_id = $request->rombel_id;
        $students->gender = $request->gender;
        $students->nis = $request->nis;
        $students->save();

        return redirect()->route('student.index');

    }

    public function edit($id)
    {
        $student = Students::find($id);
        $rombels = Rombels::all();

        return view('student.edit', compact('student','rombels'));
    }

    public function update(Request $request,string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required',
            'rombel_id' => 'required',
            'gender' => 'required',
            'nis' => 'required',
        ]);

        // Find the student by ID
        $students = Students::find($id);
        $students->name = $request->name;
        $students->rombel_id = $request->rombel_id;
        $students->gender = $request->gender;
        $students->nis = $request->nis;
        $students->save();

        // Redirect to the student list page
        return redirect()->route('student.index');
    }

    public function destroy($id)
    {
        $students = Students::find($id);
        $students->delete();
        return redirect()->route('student.index');
    }

}



