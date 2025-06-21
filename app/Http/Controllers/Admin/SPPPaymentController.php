<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SPPHistoryModel;
use App\Models\Admin\StudentModel;
use App\Models\User;
use Illuminate\Http\Request;

class SPPPaymentController extends Controller
{
    public function index(Request $request)
    {
        $data = [];

        if ($request->username) {
            $user = User::where('email', $request->username)->first();
            $student = StudentModel::where('user_id', $user->id)->first();

            $data['user'] = $user;
            $data['student'] = $student;
        }

        return view('admin.spp.spp-payment', $data);
    }

    public function create(Request $request)
    {
        $model = new SPPHistoryModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.coursework');
    }
}
