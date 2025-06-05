<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedule';
    protected $guarded = ['id'];

    public function class()
    {
        return $this->hasOne(ClassModel::class, 'id', 'class_id');
    }

    public function subject()
    {
        return $this->hasOne(SubjectModel::class, 'id', 'subject_id');
    }

    public function room()
    {
        return $this->hasOne(RoomModel::class, 'id', 'room_id');
    }
}
