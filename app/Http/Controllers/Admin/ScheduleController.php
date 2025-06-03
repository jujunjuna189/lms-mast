<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\RoomModel;
use App\Models\Admin\ScheduleModel;
use App\Models\Admin\SubjectModel;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = ScheduleModel::paginate();
        $subject = SubjectModel::all();
        $room = RoomModel::all();

        $subjects = [];
        foreach ($subject as $val) {
            $subjects[$val->id] = $val->title;
        }

        $rooms = [];
        foreach ($room as $val) {
            $rooms[$val->id] = $val->title;
        }

        $data['schedule'] = $schedule;
        $data['subject'] = $subjects;
        $data['room'] = $rooms;

        return view('admin.schedule.schedule', $data);
    }

    public function create(Request $request)
    {
        $model = new ScheduleModel();
        $model->fill($request->all());
        $model->save();

        return redirect()->route('admin.schedule');
    }

    public function update(Request $request, $id)
    {
        $model = ScheduleModel::find($request->id);
        $model->fill($request->except('id'));
        $model->save();

        return redirect()->route('admin.schedule');
    }

    public function delete($id)
    {
        $model = ScheduleModel::find($id);
        $model->delete();

        return redirect()->route('admin.schedule');
    }
}
