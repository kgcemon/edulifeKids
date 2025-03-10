<?php

namespace App\Http\Controllers;

use App\Models\NavBar;
use Illuminate\Http\Request;

class NavbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allNavBar = NavBar::all();
       return view('pages.dashboard.navbar',compact('allNavBar'));
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
            $validatedData = $request->validate([
                'name' => 'required',
                'link' => 'required',
            ]);

            NavBar::create($validatedData);
            return back()->with('success', 'Data added successfully.');

        }catch (\Exception $e){
            return back()->with('error', $e->getMessage());
        }
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
        NavBar::findorfail($id)->delete();
        return back()->with('success', 'Data deleted successfully.');
    }
}
