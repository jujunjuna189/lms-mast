<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SPPModel;
use App\Models\Admin\StudentModel;
use App\Models\User;
use Illuminate\Http\Request;

class SPPDetailController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->user_id);
        $student = StudentModel::where('user_id', $request->user_id)->first();
        $spp = SPPModel::where('user_id', $request->user_id)->first();

        $data['user'] = $user;
        $data['student'] = $student;
        $data['spp'] = $spp;

        return view('admin.spp.spp-detail', $data);
    }

    public function create(Request $request)
    {
        $model = SPPModel::where('user_id', $request->user_id)->first();
        if (!$model) $model = new SPPModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.spp.detail', ['user_id' => $request->user_id]);
    }
}
