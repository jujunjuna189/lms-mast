<?php

namespace App\Http\Controllers;

use App\Models\Admin\ForumModel;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forum = ForumModel::all();

        $data['forum'] = $forum;

        return view('forum.forum', $data);
    }

    public function create(Request $request)
    {
        $model = new ForumModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('forum');
    }
}
