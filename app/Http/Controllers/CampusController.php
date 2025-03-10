<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CampusController extends Controller
{
    function campusPage():View{
        return view('pages.dashboard.campus-page');
    }


    function CampusList(Request $request){
        return Campus::all();
    }


   function createCampus(Request $request){
       return Campus::create($request->all());
   }

   function deleteCampus(Request $request){
        $campusID = $request->input("id");
        return Campus::where('id', $campusID)->delete();
   }

   function campusById(Request $request)
   {
       $id = $request->input("id");
       return Campus::where('id', $id)->first();
   }

   function campusUpdate(Request $request){
        $id = $request->input("id");
        return Campus::where('id', $id)->update($request->input());
   }


}
