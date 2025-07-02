<?php

namespace App\Http\Controllers;

use App\Models\Admin\SPPHistoryModel;
use App\Models\Admin\SPPModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SPPController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $spp = SPPModel::where('user_id', $user->id)->first();
        $history = SPPHistoryModel::where('user_id', $user->id)->get();

        $data['controller'] = $this;
        $data['spp'] = $spp;
        $data['history'] = $history;

        return view('spp.spp', $data);
    }
}
