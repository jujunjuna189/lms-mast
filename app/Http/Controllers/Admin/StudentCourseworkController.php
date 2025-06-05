<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\StudentCourseworkModel;
use Illuminate\Http\Request;

class StudentCourseworkController extends Controller
{
    public function index(Request $request)
    {
        $studentCoursework = StudentCourseworkModel::where('coursework_id', $request->coursework_id)->paginate();

        $data['student_coursework'] = $studentCoursework;

        return view('admin.student.student-coursework', $data);
    }

    public function create(Request $request)
    {
        $model = new StudentCourseworkModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.student.coursework', ['coursework_id' => $request->coursework_id]);
    }

    public function delete($id)
    {
        $model = StudentCourseworkModel::find($id);
        $model->delete();

        return redirect()->route('admin.student.coursework', ['coursework_id' => $model->coursework_id]);
    }
}
