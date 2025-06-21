<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\SPPHistoryModel;
use App\Models\Admin\SPPModel;
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
            $spp = SPPModel::where('user_id', $user->id)->first();
            $history = SPPHistoryModel::where('user_id', $user->id)->get();

            $data['user'] = $user;
            $data['student'] = $student;
            $data['spp'] = $spp;
            $data['history'] = $history;
        }

        return view('admin.spp.spp-payment', $data);
    }

    public function create(Request $request)
    {
        $spp = SPPModel::where('user_id', $request->user_id)->first();
        if (!isset($spp)) return redirect()->route('admin.spp.payment', ['username' => $request->username]);
        if ($request->amount > $spp->amount) return redirect()->route('admin.spp.payment', ['username' => $request->username]);

        $model = new SPPHistoryModel();
        $model->fill($request->all());
        $model->save();

        // update table spp
        $model = SPPModel::where('user_id', $model->user_id)->first();
        $model->amount = $model->amount - $request->amount;
        $model->save();

        return redirect()->route('admin.spp.payment', ['username' => $request->username]);
    }
}
