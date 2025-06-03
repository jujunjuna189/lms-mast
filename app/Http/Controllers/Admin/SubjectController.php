<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SubjectModel;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subject = SubjectModel::paginate();

        $data['subject'] = $subject;

        return view('admin.subject.subject', $data);
    }

    public function create(Request $request)
    {
        $model = new SubjectModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.subject');
    }

    public function update(Request $request, $id)
    {
        $model = SubjectModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return redirect()->route('admin.subject');
    }

    public function delete($id)
    {
        $model = SubjectModel::find($id);
        $model->delete();

        return redirect()->route('admin.subject');
    }
}
