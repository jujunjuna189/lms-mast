<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\TeacherModel;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teacher = TeacherModel::paginate();

        $data['teacher'] = $teacher;

        return view('admin.teacher.teacher', $data);
    }

    public function create(Request $request)
    {
        $model = new TeacherModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.teacher');
    }

    public function update(Request $request, $id)
    {
        $model = TeacherModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return redirect()->route('admin.teacher');
    }

    public function delete($id)
    {
        $model = TeacherModel::find($id);
        $model->delete();

        return redirect()->route('admin.teacher');
    }
}
