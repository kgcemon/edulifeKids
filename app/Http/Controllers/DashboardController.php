<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use App\Models\Student;
use App\Models\Visitors;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    function DashboardPage(): View
    {
        $allAdmissionCount = Visitors::all()->count();
        $allCampusCount = Campus::all()->count();
        $allStudentCount = Student::count();
        $feeType = DB::table('fee')->count();
        $allCount = [
            'allVisitorCount' => $allAdmissionCount,
            'allCampusCount' => $allCampusCount,
            'allStudentCount' => $allStudentCount,
            'feeType' => $feeType,
            'allTeacherCount' => 5
        ];
        return view('pages.dashboard.dashboard-page', compact("allCount"));
    }
}
