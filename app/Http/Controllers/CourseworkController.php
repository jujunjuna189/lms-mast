<?php

namespace App\Http\Controllers;

use App\Models\Admin\CourseworkModel;
use App\Models\Admin\StudentClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseworkController extends Controller
{
    public function index()
    {
        $student = StudentClassModel::where('user_id', Auth::user()->id)->first();
        $coursework = CourseworkModel::where('class_id', $student->class_id ?? null)->get();

        $data['coursework'] = $coursework;

        return view('coursework.coursework', $data);
    }
}
