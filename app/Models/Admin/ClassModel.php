<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = 'class';
    protected $guarded = ['id'];

    public function grade()
    {
        return $this->hasOne(GradeModel::class, 'id', 'grade_id');
    }

    public function major()
    {
        return $this->hasOne(MajorModel::class, 'id', 'major_id');
    }
}
