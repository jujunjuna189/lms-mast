<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassModel;
use App\Models\Admin\GradeModel;
use App\Models\Admin\MajorModel;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
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

        $class = ClassModel::paginate();

        $data['grade'] = $grades;
        $data['major'] = $majors;
        $data['class'] = $class;

        return view('admin.class.class', $data);
    }

    public function create(Request $request)
    {
        $model = new ClassModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.class');
    }

    public function update(Request $request, $id)
    {
        $model = ClassModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return redirect()->route('admin.class');
    }

    public function delete($id)
    {
        $model = ClassModel::find($id);
        $model->delete();

        return redirect()->route('admin.class');
    }
}
