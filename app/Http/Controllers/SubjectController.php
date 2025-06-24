<?php

namespace App\Http\Controllers;

use App\Models\Admin\StudentClassModel;
use App\Models\Admin\SubjectClassModel;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function index()
    {
        $student = StudentClassModel::where('user_id', Auth::user()->id)->first();
        $subject = SubjectClassModel::where('class_id', $student->class_id ?? null)->get();

        $data['subject'] = $subject;

        return view('subject.subject', $data);
    }
}
