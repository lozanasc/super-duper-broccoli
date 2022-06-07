<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RequirementsController;
use App\Http\Controllers\NotifcationController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\DeclarationsController;
use App\Http\Controllers\UserController;
use App\Models\Appointment;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing.home');
})->name('home');

Route::get('/about', function () {
    return view('landing.about');
})->name('about');

Route::get('/services', function () {
    return view('landing.services');
})->name('services');

Route::get('/services/assessment', function () {
    return view('landing.services.req1');
})->name('assessment');

Route::get('/services/map', function () {
    return view('landing.services.req2');
})->name('map');

Route::get('/services/certification', function () {
    return view('landing.services.req3');
})->name('certification');

Route::get('/services/cancellations', function () {
    return view('landing.services.req4');
})->name('cancellations');

Route::get('/contact', function () {
    return view('landing.contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| Social Login Routes
|--------------------------------------------------------------------------
*/
Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('/callback/google', [GoogleController::class, 'handleCallback']);

/*
|--------------------------------------------------------------------------
| Protected Routes
|--------------------------------------------------------------------------
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // ? Dashboard
    Route::get('/dashboard', function () {
        $role = auth()->user()->role;

        $appointments = $role === "User" ? Appointment::where('user', auth()->user()->name)->get() : Appointment::get();
        return view('dashboard', [
            'appointment' => $appointments
        ]);
    })->name('dashboard');

    // ? Manage Users
    Route::get('/manage/users', [UserController::class, "view_users"])->name('view_users');
    Route::get('/manage/user/view/{id}', [UserController::class, "view_user"])->name('view_user');
    Route::post('/manage/user/edit/{id}', [UserController::class, "edit_user"])->name('edit_user');
    Route::get('/manage/user/delete/{id}', [UserController::class, "delete_users"])->name('delete_user');
    Route::get('/manage/user/promote/{id}', [UserController::class, "promote_user"])->name('promote_user');
    Route::get('/manage/user/demote/{id}', [UserController::class, "demote_user"])->name('demote_user');

    // ? Feedbacks
    Route::get('/feedback', function () { return view('user.feedback'); })->name('feedback');
    Route::get('/feedback/all', [FeedbackController::class, "view_feedback"])->name('view_feedback');
    Route::post('/feedback', [FeedbackController::class, "send_feedback"])->name('submit_feedback');
    Route::get('/feedback/delete/{id}', [FeedbackController::class, "delete_feedback"])->name('delete_feedback');

    // ? Scheduling for Appointments
    Route::get('/schedule', function () { return view('user.schedule'); })->name('schedule');
    Route::post('/schedule/new', [AppointmentController::class, "new_appointment"])->name('new_appointment');

    // ? Notifications
    Route::get('/notifications', [NotifcationController::class, "view_notifications_by_role"])->name('notifications');
    Route::get('/notifications/delete/{id}', [NotifcationController::class, "delete_notification"])->name('delete_notification');

    // ? Appointments
    Route::get('/appointments', [AppointmentController::class, 'view_appointments'])->name('appointments');
    Route::get('/appointments/cancel/{id}', [AppointmentController::class, "cancel_appointment"])->name('cancel_appointment');
    Route::get('/appointments/view/{id}', [AppointmentController::class, "view_appointment"])->name('view_appointment');
    Route::post('/appointments/update/{id}', [AppointmentController::class, "update_appointment"])->name('update_appointment');
    Route::get('/appointments/approve/{id}', [AppointmentController::class, "approve_appointment"])->name('approve_appointment');
    Route::get('/appointments/accept/{id}/{type}', [AppointmentController::class, "accept_appointment"])->name('accept_appointment');
    Route::get('/appointments/approved/{id}', [AppointmentController::class, "generate_appointment_receipt"])->name('generate');

    // ? Declarations
    Route::get('/declarations', [DeclarationsController::class, "view_declarations"])->name('view_declarations');
    Route::get('/declarations/view/{id}', [DeclarationsController::class, "view_declaration"])->name('view_declaration');
    Route::get('/declarations/delete/{id}', [DeclarationsController::class, "delete_declaration"])->name('delete_declaration');
    Route::post('/declarations/new', [DeclarationsController::class, "add_declaration"])->name('add_declaration');

    // ? Requirements
    Route::post('/requirements/service/1/{id}', [RequirementsController::class, "service1"])->name('service1');
    Route::post('/requirements/service/2/{id}', [RequirementsController::class, "service2"])->name('service2');
    Route::post('/requirements/service/3/{id}', [RequirementsController::class, "service3"])->name('service3');
    Route::post('/requirements/service/4/{id}', [RequirementsController::class, "service4"])->name('service4');
});
