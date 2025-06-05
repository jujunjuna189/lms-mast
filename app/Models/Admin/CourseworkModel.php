<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CourseworkModel extends Model
{
    protected $table = 'coursework';
    protected $guarded = ['id'];

    public function class()
    {
        return $this->hasOne(ClassModel::class, 'id', 'class_id');
    }

    public function subject()
    {
        return $this->hasOne(SubjectModel::class, 'id', 'subject_id');
    }
}
