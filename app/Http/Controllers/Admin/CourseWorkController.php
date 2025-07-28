<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassModel;
use App\Models\Admin\CourseworkModel;
use App\Models\Admin\StudentCourseworkModel;
use App\Models\Admin\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $model->fill($request->except('file'));

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/coursework'); // simpan di storage/app/public/coursework
            $model->file = str_replace('public/', 'storage/', $path); // simpan path-nya
        }

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

    public function upload(Request $request, $id)
    {
        $model = new StudentCourseworkModel();
        $model->user_id = Auth::user()->id;
        $model->coursework_id = $id;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('public/coursework'); // simpan di storage/app/public/coursework
            $model->work = str_replace('public/', 'storage/', $path); // simpan path-nya
        }
        $model->status = 1;
        $model->save();

        return redirect()->route('coursework');
    }

    public function delete($id)
    {
        $model = CourseworkModel::find($id);
        $model->delete();

        return redirect()->route('admin.coursework');
    }
}
