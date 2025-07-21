<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ForumModel;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index()
    {
        $forum = ForumModel::paginate();

        $data['forum'] = $forum;

        return view('admin/forum/forum', $data);
    }

    public function create(Request $request)
    {
        $model = new ForumModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.forum');
    }

    public function update(Request $request, $id)
    {
        $model = ForumModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return redirect()->route('admin.forum');
    }

    public function delete($id)
    {
        $model = ForumModel::find($id);
        $model->delete();

        return redirect()->route('admin.forum');
    }
}
