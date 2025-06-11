<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\StudentModel;
use App\Models\User;
use Illuminate\Http\Request;

class SPPDetailController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->user_id);
        $student = StudentModel::where('user_id', $request->user_id)->first();

        $data['user'] = $user;
        $data['student'] = $student;

        return view('admin.spp.spp-detail', $data);
    }
}
