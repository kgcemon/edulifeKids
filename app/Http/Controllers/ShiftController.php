<?php

namespace App\Http\Controllers;

use App\Models\Shifts;
use Illuminate\Http\Request;

class ShiftController extends Controller
{
    // Display the shift page with all shifts
    public function ShiftPage()
    {
        $shifts = Shifts::all();
        return view('pages.dashboard.shift-page', compact('shifts'));
    }

    // Store a new shift
    public function store(Request $request)
    {
        Shifts::create($request->input());

        return redirect()->back()->with('success', 'Shift created successfully!');
    }

    // Show the form for editing a specific shift
    public function edit($id)
    {
        $shift = Shifts::findOrFail($id);
        return view('pages.dashboard.edit-shift', compact('shift'));
    }

    // Update a specific shift
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        $shift = Shifts::findOrFail($id);
        $shift->update([
            'name' => $request->name,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
        ]);

        return redirect()->back()->with('success', 'Shift updated successfully!');
    }

    // Delete a specific shift
    public function destroy($id)
    {
        $shift = Shifts::findOrFail($id);


        return $shift->delete();
    }
}
