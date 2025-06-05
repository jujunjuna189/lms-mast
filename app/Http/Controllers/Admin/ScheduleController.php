<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\ClassModel;
use App\Models\Admin\RoomModel;
use App\Models\Admin\ScheduleModel;
use App\Models\Admin\SubjectModel;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        $schedule = ScheduleModel::when($request->day != null, function ($query) use ($request) {
            $query->where('day', $request->day);
        })->when($request->class != null, function ($query) use ($request) {
            $query->where('class_id', $request->class);
        })->paginate();
        $subject = SubjectModel::all();
        $class = ClassModel::all();
        $room = RoomModel::all();

        $subjects = [];
        foreach ($subject as $val) {
            $subjects[$val->id] = $val->title;
        }

        $classs = [];
        foreach ($class as $val) {
            $classs[$val->id] = $val->name;
        }

        $rooms = [];
        foreach ($room as $val) {
            $rooms[$val->id] = $val->title;
        }

        $data['filter']['day'] = isset($request->day) ? $request->day : 'Semua';
        $data['filter']['class'] = isset($request->class) ? $request->class : 'Semua';
        $data['schedule'] = $schedule;
        $data['subject'] = $subjects;
        $data['class'] = $classs;
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
