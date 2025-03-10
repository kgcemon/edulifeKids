<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function pages()
    {
        return view('pages.dashboard.logo-update');
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
            // Validate request
            $request->validate([
                'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:5048',
            ]);

            $img = $request->file('img');
            $fileName = $img->getClientOriginalName();
            $imgName = "{$fileName}";
            $imgPath = "uploads/{$imgName}";
            // Move file to uploads directory
            $img->move(public_path('uploads'), $imgName);

            // Delete old logo (if necessary)
            Logo::truncate(); // Deletes all records, replace with specific condition if needed

            // Save new logo
            return Logo::create([
                'img_url' => $imgPath,
            ]);

        }catch (\Exception $exception){
            return response()->json([],400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return Logo::all();
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
    public function destroy(Request $request)
    {
        $id = $request->input('id');
        return Logo::destroy($id);
    }
}
