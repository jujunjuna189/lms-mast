<?php

namespace App\Http\Controllers;

use App\Models\Admin\CourseworkModel;
use App\Models\Admin\StudentClassModel;
use App\Models\Admin\StudentCourseworkModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseworkController extends Controller
{
    public function index()
    {
        $student = StudentClassModel::where('user_id', Auth::user()->id)->first();
        $coursework = CourseworkModel::where('class_id', $student->class_id ?? null)->get();

        foreach ($coursework as $val) {
            $work = StudentCourseworkModel::where('user_id', Auth::user()->id ?? null)->where('coursework_id', $val->id)->count();

            $val->work = $work > 0 ? 1 : 0;
        }

        $data['coursework'] = $coursework;

        return view('coursework.coursework', $data);
    }
}
