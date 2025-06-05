<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassModel;
use App\Models\Admin\StudentClassModel;
use App\Models\Admin\StudentModel;
use App\Models\User;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    public function index(Request $request)
    {
        $studentClass = StudentClassModel::where('class_id', $request->class_id)->paginate();

        $class = ClassModel::find($request->class_id);

        $notStudent = StudentClassModel::where('class_id', $request->class_id)->get();
        $ids = [];
        foreach ($notStudent as $val) {
            $ids[] = $val->user_id;
        }
        $student = StudentModel::where('grade_id', $class->grade_id)->where('major_id', $class->major_id)->whereNotIn('user_id', $ids)->get();

        $students = [];
        foreach ($student as $val) {
            $students[$val->user_id] = $val->user->name;
        }

        $data['student'] = $students;
        $data['class'] = $class;
        $data['student_class'] = $studentClass;

        return view('admin.student.student-class', $data);
    }

    public function create(Request $request)
    {
        $model = new StudentClassModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.student.class', ['class_id' => $request->class_id]);
    }

    public function delete($id)
    {
        $model = StudentClassModel::find($id);
        $model->delete();

        return redirect()->route('admin.student.class', ['class_id' => $model->class_id]);
    }
}
