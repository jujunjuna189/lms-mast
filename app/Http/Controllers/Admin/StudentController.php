<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\GradeModel;
use App\Models\Admin\MajorModel;
use App\Models\Admin\StudentModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
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

        $student = StudentModel::paginate();

        $data['grade'] = $grades;
        $data['major'] = $majors;
        $data['student'] = $student;

        return view('admin.student.student', $data);
    }

    public function createUniq()
    {
        $user = User::orderBy('id', 'desc')->first();
        return 'STDN' . (($user->id + 1) < 10 ? "0" . $user->id + 1 : $user->id + 1);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            $uniq = $this->createUniq();

            $userModel = new User();
            $userModel->name = $request->name;
            $userModel->email = $uniq;
            $userModel->password = Hash::make($uniq);
            $userModel->role = 'user';
            $userModel->save();

            $model = new StudentModel();
            $model->user_id = $userModel->id;
            $model->fill($request->all());
            $model->save();

            DB::commit();

            return redirect()->route('admin.student');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.student');
        }
    }

    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $uniq = $this->createUniq();

            $model = StudentModel::find($request->id);
            $model->fill($request->except('id'));
            $model->save();

            $userModel = User::find($model->user_id);
            $userModel->name = $request->name;
            $userModel->save();

            DB::commit();

            return redirect()->route('admin.student');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.student');
        }
    }

    public function delete($id)
    {
        $model = StudentModel::find($id);
        $model->delete();

        return redirect()->route('admin.student');
    }
}
