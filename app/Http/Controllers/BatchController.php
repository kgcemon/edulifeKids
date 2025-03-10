<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches = Batch::all();
        return view('pages.dashboard.batch-page', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            if($request->get("BatchCode") && $request->get("BatchName")){
                Batch::create($request->input());
                return back()->with('success', 'Batch created successfully');
            }else{
               return back()->with("error", "Please enter all fields");
            }
        }catch (\Exception $exception){
          return  back()->with('error', "Something went wrong");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Batch::find($id);

        return view('pages.dashboard.batch-page', compact('data'));
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
        // Step 1: Find the model by ID
        $model = Batch::find($id);

        // Step 2: Check if model exists
        if (!$model) {
            return back()->with("error", "Record not found");
        }

        $model->update($request->input());

        return back()->with('success', 'Record updated successfully');

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $batch = Batch::find($id);

        if (!$batch) {
            return back()->with('error', 'Batch not found');
        }

        $batch->delete();
        return back()->with('success', 'Batch deleted successfully');
    }

}
