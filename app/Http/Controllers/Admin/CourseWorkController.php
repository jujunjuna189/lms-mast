<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassModel;
use App\Models\Admin\CourseworkModel;
use App\Models\Admin\StudentCourseworkModel;
use App\Models\Admin\SubjectModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $newFilename = "file_" . date('Ymdhis') . rand(10000000, 99999999) . "." . $file->getClientOriginalExtension();
                $path = 'coursework';
                Storage::disk('public')->putFileAs($path, $file, $newFilename);
                $model->file = $path . '/' . $newFilename;
            }
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
            $newFilename = "file_" . date('Ymdhis') . rand(10000000, 99999999) . "." . $file->getClientOriginalExtension();
            $path = 'coursework';
            Storage::disk('public')->putFileAs($path, $file, $newFilename);
            $model->work = $path . '/' . $newFilename;
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
