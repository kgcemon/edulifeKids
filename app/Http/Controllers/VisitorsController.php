<?php

namespace App\Http\Controllers;

use App\Models\Visitors;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VisitorsController extends Controller
{

    function visitorPage():View{
        return view('pages.dashboard.visitor-page');
    }

    function CreateVisitor(Request $request){
        try {
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'nullable|email',
                'mobile' => 'nullable|min:11|max:11|regex:/(01)[0-9]{9}/',
            ]);
            Visitors::create($request->input());

            return back()->with('success', 'Visitor Added Successfully');

        }catch (\Exception $exception){
            return back()->with('error', $exception);
        }
    }


    function VisitorList(){
        return Visitors::paginate(10);
    }


    function VisitorDelete(Request $request){
        $customer_id=$request->input('id');
        return Visitors::where('id',$customer_id)->delete();
    }


    function VisitorByID(Request $request){
        $_id=$request->input('id');
        return Visitors::where('id',"=",$_id)->first();
    }


     function VisitorUpdate(Request $request){
        $id=$request->input('id');
        return Visitors::where('id',$id)->update($request->input());
    }



}
