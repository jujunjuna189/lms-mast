<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\AnnouncementModel;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    public function index()
    {

        $announcement = AnnouncementModel::paginate();

        $data['announcement'] = $announcement;

        return view('admin.announcement.announcement', $data);
    }

    public function create(Request $request)
    {
        $model = new AnnouncementModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.announcement');
    }

    public function update(Request $request, $id)
    {
        $model = AnnouncementModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return redirect()->route('admin.announcement');
    }

    public function delete($id)
    {
        $model = AnnouncementModel::find($id);
        $model->delete();

        return redirect()->route('admin.announcement');
    }
}
