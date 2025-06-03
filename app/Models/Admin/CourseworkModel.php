<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CourseworkModel extends Model
{
    protected $table = 'coursework';
    protected $guarded = ['id'];

    public function subject()
    {
        return $this->hasOne(SubjectModel::class, 'id', 'subject_id');
    }
}
