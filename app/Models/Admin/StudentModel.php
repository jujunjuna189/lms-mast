<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class StudentModel extends Model
{
    protected $table = 'student';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function grade()
    {
        return $this->hasOne(GradeModel::class, 'id', 'grade_id');
    }

    public function major()
    {
        return $this->hasOne(MajorModel::class, 'id', 'major_id');
    }
}
