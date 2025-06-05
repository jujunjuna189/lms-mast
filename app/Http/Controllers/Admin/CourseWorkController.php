<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassModel;
use App\Models\Admin\CourseworkModel;
use App\Models\Admin\SubjectModel;
use Illuminate\Http\Request;

class CourseWorkController extends Controller
{
    public function index()
    {
        $subject = SubjectModel::all();
        $coursework = CourseworkModel::all();
        $class = ClassModel::all();

        $subjects = [];
        foreach ($subject as $val) {
            $subjects[$val->id] = $val->title;
        }

        $classs = [];
        foreach ($class as $val) {
            $classs[$val->id] = $val->name;
        }

        $data['subject'] = $subjects;
        $data['class'] = $classs;
        $data['coursework'] = $coursework;

        return view('admin.coursework.coursework', $data);
    }

    public function create(Request $request)
    {
        $model = new CourseworkModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.coursework');
    }

    public function update(Request $request, $id)
    {
        $model = CourseworkModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return redirect()->route('admin.coursework');
    }

    public function delete($id)
    {
        $model = CourseworkModel::find($id);
        $model->delete();

        return redirect()->route('admin.coursework');
    }
}
