<?php

namespace App\Http\Controllers;

use App\Models\Admin\StudentModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $student = StudentModel::where('user_id', Auth::user()->id ?? null)->first();

        $data['user'] = $user;
        $data['student'] = $student;

        return view('dashboard.dashboard', $data);
    }

    public function register()
    {
        $user = Auth::user();
        $student = StudentModel::where('user_id', Auth::user()->id ?? null)->first();

        if ($student->status == 'approve') {
            return redirect()->route('dashboard');
        }

        $data['user'] = $user;
        $data['student'] = $student;

        return view('dashboard.dashboard-register', $data);
    }
}
