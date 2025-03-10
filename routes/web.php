<?php

use App\Http\Controllers\BatchController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\VisitorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\TokenVerificationMiddleware;
use Illuminate\Support\Facades\Route;


// Web API Routes
//Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin'])->name('login');
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);

//visitors
Route::get("/visitors-list",[VisitorsController::class,'VisitorList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-visitors",[VisitorsController::class,'VisitorDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/visitors-by-id",[VisitorsController::class,'VisitorByID'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-visitors",[VisitorsController::class,'VisitorUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-visitors",[VisitorsController::class,'CreateVisitor'])->middleware([TokenVerificationMiddleware::class])->name("create-visitors");

//campus
Route::get("/campus-list",[CampusController::class,'CampusList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/campus-create",[CampusController::class,'createCampus'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/campus-delete",[CampusController::class,'deleteCampus'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/campus-by-id",[CampusController::class,'campusById'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/campus-update",[CampusController::class,'campusUpdate'])->middleware([TokenVerificationMiddleware::class]);


//shift
Route::get("/shift",[ShiftController::class,'ShiftPage'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/shift', [ShiftController::class, 'store'])->name('shifts.store');
Route::get('/shifts/{id}/edit', [ShiftController::class, 'edit'])->name('shifts.edit');
Route::put('/shifts/{id}', [ShiftController::class, 'update'])->name('shifts.update');
Route::delete('/shifts/{id}', [ShiftController::class, 'destroy'])->name('shifts.destroy');

//batch-resource
Route::resource("/batch",BatchController::class)->middleware([TokenVerificationMiddleware::class]);
Route::resource("/navbar",NavbarController::class)->middleware([TokenVerificationMiddleware::class]);

//session
Route::resource("/session",SessionController::class)->middleware([TokenVerificationMiddleware::class]);

//logo
Route::get("/logo",[LogoController::class, "pages"])->middleware([TokenVerificationMiddleware::class]);
Route::post("/create-logo",[LogoController::class, "store"])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-logo",[LogoController::class, "show"])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-logo",[LogoController::class, "destroy"])->middleware([TokenVerificationMiddleware::class]);

//student
Route::resource("student",StudentController::class)->middleware([TokenVerificationMiddleware::class])->names("students");
//hero-section
Route::resource("/hero-Section",HeroSectionController::class)->middleware([TokenVerificationMiddleware::class]);


// User Logout
Route::get('/logout',[UserController::class,'UserLogout']);

//fee
Route::resource('/fee',FeeController::class)->middleware([TokenVerificationMiddleware::class]);
Route::resource('/invoice',InvoiceController::class)->middleware([TokenVerificationMiddleware::class]);
Route::post('/invoices/{id}/update-status', [InvoiceController::class, 'updateStatus'])->name('invoices.updateStatus');

// Page Routes
Route::get('/',[UserController::class,'LoginPage']);
Route::get('/campus',[CampusController::class,'campusPage']);
//Route::get('/student',[StudentController::class,'studentPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/admissionPage',[VisitorsController::class, 'visitorPage'])->middleware([TokenVerificationMiddleware::class]);

Route::get('test',function(){
    return view('pages.dashboard.invoice');
});
