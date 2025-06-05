<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SubjectClassModel extends Model
{
    protected $table = 'subject_class';
    protected $guarded = ['id'];

    public function subject()
    {
        return $this->hasOne(SubjectModel::class, 'id', 'subject_id');
    }

    public function class()
    {
        return $this->hasOne(ClassModel::class, 'id', 'class_id');
    }
}
