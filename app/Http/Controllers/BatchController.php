<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Batch;
use App\Models\Course;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {     
          $courses=Course::all();
          $batches=Batch::paginate(10);
          return view('batch.index',compact('courses','batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('batch.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'batch_no'=>'required|string|max:20',
            'course_id'=>'required|string|max:20',
            'teacher'=>'required|string|max:20',
       ]);
       $student=Batch::create([
        'batch_no'=>$request->batch_no,
        'course_id'=>$request->course_id,
        'teacher'=>$request->teacher,

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
