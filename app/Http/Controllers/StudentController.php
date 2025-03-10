<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Campus;
use App\Models\Fee;
use App\Models\Session;
use App\Models\Shifts;
use App\Models\Student;
use Carbon\Traits\Date;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    function index()
    {
        try {
            $students = Student::paginate(10);
            $campuses = Campus::pluck('CampusName', 'id');
            $shifts = Shifts::pluck('name', 'id');
            $batches = Batch::pluck('BatchName', 'id');
            $sessions = Session::pluck('year', 'id');
            $feeType = fee::where('status','=', 'active')->pluck('FeeType', 'id');
            return view('pages.dashboard.student-page',
                compact('students',
                    'campuses',
                    'shifts', 'batches',
                    'sessions', 'feeType'
                ));
        } catch (\Exception $e) {
            Log::error("Error fetching student list: " . $e->getMessage());
            abort(500, 'Failed to retrieve student list.');
        }
    }


    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'StudentID' => 'required',
                'StudentName' => 'required',
                'Campus' => 'required',
                'Batch' => 'required',
                'Shift' => 'required',
                'AdmissionDate' => 'required',
                'Fnumber' => 'required',
                'Mnumber' => 'required',
                'Session' => 'required',
                'FeeType' => 'required',
                'Status' => 'required',
                'Discount' => 'required',
            ]);
            $discount = 0;

            if ($request->input('Discount') != null) {
                $discount = $request->input('Discount');
            }

            $feeType = $request->input('FeeType');

            $fee = fee::where('feeType', $feeType)->get();

            if($fee->isEmpty()){
                return back()->with('error', 'No fee found');
            }

            DB::table('invoice')->insert([
                'StudentID' => $request->input('StudentID'),
                'StudentName' => $request->input('StudentName'),
                'campus_name' => $request->input('Campus'),
                'invoice_number' => '337w3r',
                'campus_address' => $request->input('Campus'),
                'invoice_date' => date('m-Y'),
                'invoice_name' => $request->input('FeeType'),
                'total_price' => $fee[0]->amount-$discount,
                'total' => $fee[0]->amount-$discount,
                'discount' => $discount,
                'vat' => 0,
                'paid' => 0,
                'due' => 0,
                'status' => 'pending'
            ]);



            Student::create($request->input());
            return redirect()->route('students.index') // Redirect to index (list) route
            ->with('success', 'Student created successfully.');
        } catch (\Exception $e) {
            Log::error("Error adding student: " . $e->getMessage());
            return back()->with('error', $e->getMessage()); // Redirect back with errors.
        }
    }


    public function show(int $id): View
    {
        try {
            $student = Student::findOrFail($id);
            return view('pages.dashboard.student-show', ['student' => $student]);
        } catch (\Exception $e) {
            Log::error("Error showing student: " . $e->getMessage());
            abort(404, 'Student not found.');
        }
    }


    public function edit(int $id): View
    {
        try {
            $student = Student::findOrFail($id);
            $campuses = Campus::pluck('CampusName', 'id');
            $shifts = Shifts::pluck('name', 'id');
            $batches = Batch::pluck('BatchName', 'id');
            $sessions = Session::pluck('year', 'id');
            $fees = Fee::where('status', 'active')->get(['amount', 'feeType', 'id']);

            return view('pages.dashboard.student-edit', [
                'student' => $student,
                'campuses' => $campuses,
                'shifts' => $shifts,
                'batches' => $batches,
                'sessions' => $sessions,
                'fees' => $fees,
            ]);
        } catch (\Exception $e) {
            Log::error("Error loading edit student form: " . $e->getMessage());
            abort(404, 'Student not found.');
        }
    }


    public function update(Request $request, int $id): RedirectResponse
    {
        try {
            $student = Student::findOrFail($id);
            $student->update($request->validated());

            return redirect()->route('students.index') // Redirect to index (list) route
            ->with('success', 'Student updated successfully.');
        } catch (\Exception $e) {
            Log::error("Error updating student: " . $e->getMessage());
            return back()->withInput()->withErrors(['error' => 'Failed to update student.']);
        }
    }

    /**
     * Remove the specified student from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $student = Student::findOrFail($id);
            $student->delete();

            return redirect()->route('students.index') // Redirect to index (list) route
            ->with('success', 'Student deleted successfully.');
        } catch (\Exception $e) {
            Log::error("Error deleting student: " . $e->getMessage());
            return back()->withErrors(['error' => 'Failed to delete student.']);
        }
    }
}
