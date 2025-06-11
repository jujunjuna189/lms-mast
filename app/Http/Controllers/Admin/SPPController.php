<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GradeModel;
use App\Models\Admin\MajorModel;
use App\Models\Admin\StudentModel;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    public function index(Request $request)
    {
        $grade = GradeModel::all();
        $major = MajorModel::all();

        $grades = [];
        foreach ($grade as $val) {
            $grades[$val->id] = $val->title;
        }

        $majors = [];
        foreach ($major as $val) {
            $majors[$val->id] = $val->title;
        }

        $student = StudentModel::where('grade_id', $request->grade)->where('major_id', $request->major)->get();

        $data['grade'] = $grades;
        $data['major'] = $majors;
        $data['filter']['grade'] = isset($request->grade) ? $request->grade : null;
        $data['filter']['major'] = isset($request->major) ? $request->major : null;
        $data['student'] = $student;

        return view('admin.spp.spp', $data);
    }
}
