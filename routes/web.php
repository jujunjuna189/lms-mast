<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('welcome');

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::post('/login/auth', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.auth');
Route::post('/register/auth', [App\Http\Controllers\Admin\AuthController::class, 'register'])->name('register.auth');
Route::get('/logout/auth', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout.auth');

Route::get('/register/dashboard', [App\Http\Controllers\DashboardController::class, 'register'])->name('register.dashboard');
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
Route::get('/subject', [App\Http\Controllers\SubjectController::class, 'index'])->name('subject');

Route::get('/coursework', [App\Http\Controllers\CourseworkController::class, 'index'])->name('coursework');

Route::get('/schedule', [App\Http\Controllers\ScheduleController::class, 'index'])->name('schedule');

Route::get('/forum', [App\Http\Controllers\ForumController::class, 'index'])->name('forum');
Route::post('/forum', [App\Http\Controllers\ForumController::class, 'create'])->name('forum.create');

Route::get('/spp', [App\Http\Controllers\SPPController::class, 'index'])->name('spp');


// Admin
Route::get('admin/dashboard', function () {
    return view('admin/dashboard/dashboard');
})->name('admin.dashboard');

Route::get('admin/student/class', [App\Http\Controllers\Admin\StudentClassController::class, 'index'])->name('admin.student.class');
Route::post('admin/student/class', [App\Http\Controllers\Admin\StudentClassController::class, 'create'])->name('admin.student.class.create');
Route::post('admin/student/class/{id}', [App\Http\Controllers\Admin\StudentClassController::class, 'update'])->name('admin.student.class.update');
Route::delete('admin/student/class/{id}', [App\Http\Controllers\Admin\StudentClassController::class, 'delete'])->name('admin.student.class.delete');

Route::get('admin/student/coursework', [App\Http\Controllers\Admin\StudentCourseworkController::class, 'index'])->name('admin.student.coursework');

Route::get('admin/student', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('admin.student');
Route::post('admin/student', [App\Http\Controllers\Admin\StudentController::class, 'create'])->name('admin.student.create');
Route::post('admin/student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'update'])->name('admin.student.update');
Route::post('admin/student-status/{id}', [App\Http\Controllers\Admin\StudentController::class, 'updateStatus'])->name('admin.student.update.status');
Route::delete('admin/student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'delete'])->name('admin.student.delete');

Route::get('admin/class', [App\Http\Controllers\Admin\ClassController::class, 'index'])->name('admin.class');
Route::post('admin/class', [App\Http\Controllers\Admin\ClassController::class, 'create'])->name('admin.class.create');
Route::post('admin/class/{id}', [App\Http\Controllers\Admin\ClassController::class, 'update'])->name('admin.class.update');
Route::delete('admin/class/{id}', [App\Http\Controllers\Admin\ClassController::class, 'delete'])->name('admin.class.delete');

Route::get('admin/subject/class', [App\Http\Controllers\Admin\SubjectClassController::class, 'index'])->name('admin.subject.class');
Route::post('admin/subject/class', [App\Http\Controllers\Admin\SubjectClassController::class, 'create'])->name('admin.subject.class.create');
Route::post('admin/subject/class/{id}', [App\Http\Controllers\Admin\SubjectClassController::class, 'update'])->name('admin.subject.class.update');
Route::delete('admin/subject/class/{id}', [App\Http\Controllers\Admin\SubjectClassController::class, 'delete'])->name('admin.subject.class.delete');

Route::get('admin/subject', [App\Http\Controllers\Admin\SubjectController::class, 'index'])->name('admin.subject');
Route::post('admin/subject', [App\Http\Controllers\Admin\SubjectController::class, 'create'])->name('admin.subject.create');
Route::post('admin/subject/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'update'])->name('admin.subject.update');
Route::delete('admin/subject/{id}', [App\Http\Controllers\Admin\SubjectController::class, 'delete'])->name('admin.subject.delete');

Route::get('admin/coursework', [App\Http\Controllers\Admin\CourseWorkController::class, 'index'])->name('admin.coursework');
Route::post('admin/coursework', [App\Http\Controllers\Admin\CourseWorkController::class, 'create'])->name('admin.coursework.create');
Route::post('admin/coursework/{id}', [App\Http\Controllers\Admin\CourseWorkController::class, 'update'])->name('admin.coursework.update');
Route::delete('admin/coursework/{id}', [App\Http\Controllers\Admin\CourseWorkController::class, 'delete'])->name('admin.coursework.delete');

Route::get('admin/schedule', [App\Http\Controllers\Admin\ScheduleController::class, 'index'])->name('admin.schedule');
Route::post('admin/schedule', [App\Http\Controllers\Admin\ScheduleController::class, 'create'])->name('admin.schedule.create');
Route::post('admin/schedule/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'update'])->name('admin.schedule.update');
Route::delete('admin/schedule/{id}', [App\Http\Controllers\Admin\ScheduleController::class, 'delete'])->name('admin.schedule.delete');

Route::get('admin/announcement', [App\Http\Controllers\Admin\AnnouncementController::class, 'index'])->name('admin.announcement');
Route::post('admin/announcement', [App\Http\Controllers\Admin\AnnouncementController::class, 'create'])->name('admin.announcement.create');
Route::post('admin/announcement/{id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'update'])->name('admin.announcement.update');
Route::delete('admin/announcement/{id}', [App\Http\Controllers\Admin\AnnouncementController::class, 'delete'])->name('admin.announcement.delete');

Route::get('admin/forum', [App\Http\Controllers\Admin\ForumController::class, 'index'])->name('admin.forum');
Route::post('admin/forum', [App\Http\Controllers\Admin\ForumController::class, 'create'])->name('admin.forum.create');
Route::post('admin/forum/{id}', [App\Http\Controllers\Admin\ForumController::class, 'update'])->name('admin.forum.update');
Route::delete('admin/forum/{id}', [App\Http\Controllers\Admin\ForumController::class, 'delete'])->name('admin.forum.delete');

Route::get('admin/spp/detail', [App\Http\Controllers\Admin\SPPDetailController::class, 'index'])->name('admin.spp.detail');
Route::post('admin/spp/detail', [App\Http\Controllers\Admin\SPPDetailController::class, 'create'])->name('admin.spp.detail.create');

Route::get('admin/spp/payment', [App\Http\Controllers\Admin\SPPPaymentController::class, 'index'])->name('admin.spp.payment');
Route::post('admin/spp/payment', [App\Http\Controllers\Admin\SPPPaymentController::class, 'create'])->name('admin.spp.payment.create');
Route::post('admin/spp/payment/{id}', [App\Http\Controllers\Admin\SPPPaymentController::class, 'update'])->name('admin.spp.payment.update');
Route::delete('admin/spp/payment/{id}', [App\Http\Controllers\Admin\SPPPaymentController::class, 'delete'])->name('admin.spp.payment.delete');

Route::get('admin/spp', [App\Http\Controllers\Admin\SPPController::class, 'index'])->name('admin.spp');
Route::post('admin/spp', [App\Http\Controllers\Admin\SPPController::class, 'create'])->name('admin.spp.create');
Route::post('admin/spp/{id}', [App\Http\Controllers\Admin\SPPController::class, 'update'])->name('admin.spp.update');
Route::delete('admin/spp/{id}', [App\Http\Controllers\Admin\SPPController::class, 'delete'])->name('admin.spp.delete');
