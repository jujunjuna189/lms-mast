<?php

namespace App\Http\Controllers;

use App\Models\Admin\ScheduleModel;
use App\Models\Admin\StudentClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $student = StudentClassModel::where('user_id', Auth::user()->id)->first();
        $schedule = ScheduleModel::where('class_id', $student->class_id ?? null)->when($request->day != null, function ($query) use ($request) {
            $query->where('day', $request->day);
        })->get();

        $data['filter']['day'] = isset($request->day) ? $request->day : 'Semua';
        $data['schedule'] = $schedule;

        return view('schedule.schedule', $data);
    }
}
