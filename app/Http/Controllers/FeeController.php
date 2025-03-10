<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index():View{
        $fees = Fee::paginate(10);
        return view('pages.dashboard.fee-page',compact('fees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'feeType' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            Fee::create($request->all());
            return back()->with('success', 'Fee added successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error adding fee: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fee = Fee::find($id);

        if (!$fee) {
            return back()->with('error', 'Fee not found!');
        }

        return view('fees.show', compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fee = Fee::find($id);

        if (!$fee) {
            return back()->with('error', 'Fee not found!');
        }

        $validator = Validator::make($request->all(), [
            'feeType' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $fee->update($request->all());
            return back()->with('success', 'Fee updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error updating fee: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fee = Fee::find($id);

        if (!$fee) {
            return redirect()->back()->with('error', 'Fee not found!');
        }

        try {
            $fee->delete();
            return back()->with('success', 'Fee deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error deleting fee: ' . $e->getMessage());
        }
    }
}
