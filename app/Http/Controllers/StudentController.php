<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Student;
use Nette\Schema\Message;
use App\Exports\StudentsExport;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students=Student::paginate(10);
        return view('students.index')->with('students',$students);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
           return view("students.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'name'=>'required|string|max:20',
            'address'=>'required|string|max:20',
            'mobile'=>'required|string|max:11'
       ]);
       $student=Student::create([
        'name'=>$request->name,
        'address'=>$request->address,
        'mobile'=>$request->mobile,
       ]);
       return response()->json([
        'status'=>"true",
        'message'=>"sucessfully created",
       ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $student=Student::findOrFail($id);
         return  view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      $request->validate([
            'name'=>'required|string|max:20',
            'address'=>'required|string|max:20',
            'mobile'=>'required|string|max:11'
       ]);
       $student=Student::findOrFail($id);

       $student->update([
        'name'=>$request->name,
        'address'=>$request->address,
        'mobile'=>$request->mobile,
       ]);
       return response()->json([
        'status'=>"true",
        'message'=>"sucessfully created",
       ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=Student::findOrFail($id);
        $student->delete();
        return response()->json([
             'status'=>true,
             'message'=>"deleted"
        ]);
    }

    public function export()
    {
        return Excel::download(new StudentsExport,'student.csv');
    }
}
