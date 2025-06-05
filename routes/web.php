<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
})->name('welcome');

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::post('/login/auth', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.auth');

Route::get('/dashboard', function () {
    return view('dashboard/dashboard');
})->name('dashboard');

Route::get('/subject', function () {
    return view('subject/subject');
})->name('subject');

Route::get('/coursework', function () {
    return view('coursework/coursework');
})->name('coursework');

Route::get('/schedule', function () {
    return view('schedule/schedule');
})->name('schedule');

Route::get('/forum', function () {
    return view('forum/forum');
})->name('forum');


// Admin
Route::get('admin/dashboard', function () {
    return view('admin/dashboard/dashboard');
})->name('admin.dashboard');

Route::get('admin/student', [App\Http\Controllers\Admin\StudentController::class, 'index'])->name('admin.student');
Route::post('admin/student', [App\Http\Controllers\Admin\StudentController::class, 'create'])->name('admin.student.create');
Route::post('admin/student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'update'])->name('admin.student.update');
Route::delete('admin/student/{id}', [App\Http\Controllers\Admin\StudentController::class, 'delete'])->name('admin.student.delete');

Route::get('admin/class', [App\Http\Controllers\Admin\ClassController::class, 'index'])->name('admin.class');
Route::post('admin/class', [App\Http\Controllers\Admin\ClassController::class, 'create'])->name('admin.class.create');
Route::post('admin/class/{id}', [App\Http\Controllers\Admin\ClassController::class, 'update'])->name('admin.class.update');
Route::delete('admin/class/{id}', [App\Http\Controllers\Admin\ClassController::class, 'delete'])->name('admin.class.delete');

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

Route::get('admin/forum', function () {
    return view('admin/forum/forum');
})->name('admin.forum');
