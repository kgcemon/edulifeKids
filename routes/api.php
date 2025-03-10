<?php

use App\Models\Logo;
use App\Models\NavBar;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Validator;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("/create-visitor", function (Request $request) {
    try {
        $validatedData = $request->validate([
            'name' => 'required|max:100',
            'email' => 'required|email|max:100',
            'mobile' => 'required|min:11|max:14',
            'address' => 'required|max:100',
            'KidsName' => 'required|max:50',
            'KidsAge' => 'required|max:10',
        ]);
        $visitor = Visitors::create($validatedData);
        return response()->json([
            'success' => true,
            'message' => 'Visitor created successfully',
            'data' => $visitor,
        ], 201);
    }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => $exception->getMessage(),
            ], 500);

    }
});

Route::get("/headers", function () {
    try {
        $logoUrl = Logo::select("img_url")->get();
        $navbar = Navbar::select("id","name","link")->get()->toArray();
        return response()->json([
            'success' => true,
            'data' => [
                "logo" => $logoUrl[0]['img_url'],
                "navbar"=>$navbar],
        ]);
    }catch (Exception $exception){
        return response()->json(["success" => false, "message" => $exception->getMessage()], 500);
    }
});


Route::get("/hero-section", function () {
    try {
        $data = DB::table("hero_section")->get();
        return response()->json(["success" => true, "data" => $data]);
    }catch (Exception $exception){
        return response()->json(["success" => false, "message" => $exception->getMessage()], 500);
    }
});

