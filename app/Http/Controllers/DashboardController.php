<?php

namespace App\Http\Controllers;

use App\Models\Admin\AnnouncementModel;
use App\Models\Admin\ScheduleModel;
use App\Models\Admin\StudentClassModel;
use App\Models\Admin\StudentModel;
use App\Models\Admin\SubjectModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = StudentModel::where('user_id', Auth::user()->id ?? null)->first();
        $student_class = StudentClassModel::where('user_id', Auth::user()->id ?? null)->first();
        $announcement = AnnouncementModel::all();
        Carbon::setLocale('id');

        $today = Carbon::now()->translatedFormat('l');
        $schedule = ScheduleModel::where('class_id', $student_class->class_id)->where('day', $today)->get();

        $data['user'] = $user;
        $data['student'] = $student;
        $data['announcement'] = $announcement;
        $data['schedule'] = $schedule;

        return view('dashboard.dashboard', $data);
    }

    public function register()
    {
        $user = Auth::user();
        $student = StudentModel::where('user_id', Auth::user()->id ?? null)->first();

        if ($student->status == 'approve') {
            return redirect()->route('dashboard');
        }

        $data['user'] = $user;
        $data['student'] = $student;

        return view('dashboard.dashboard-register', $data);
    }
}
