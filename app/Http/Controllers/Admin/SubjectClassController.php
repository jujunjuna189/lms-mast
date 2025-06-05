<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassModel;
use App\Models\Admin\SubjectClassModel;
use App\Models\Admin\SubjectModel;
use Illuminate\Http\Request;

class SubjectClassController extends Controller
{
    public function index(Request $request)
    {
        $subjectClass = SubjectClassModel::where('class_id', $request->class_id)->paginate();

        $class = ClassModel::find($request->class_id);

        $notSubject = SubjectClassModel::where('class_id', $request->class_id)->get();
        $ids = [];
        foreach ($notSubject as $val) {
            $ids[] = $val->subject_id;
        }
        $subject = SubjectModel::whereNotIn('id', $ids)->get();

        $subjects = [];
        foreach ($subject as $val) {
            $subjects[$val->id] = $val->title;
        }

        $data['subject'] = $subjects;
        $data['class'] = $class;
        $data['subject_class'] = $subjectClass;

        return view('admin.subject.subject-class', $data);
    }

    public function create(Request $request)
    {
        $model = new SubjectClassModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.subject.class', ['class_id' => $request->class_id]);
    }

    public function delete($id)
    {
        $model = SubjectClassModel::find($id);
        $model->delete();

        return redirect()->route('admin.subject.class', ['class_id' => $model->class_id]);
    }
}
