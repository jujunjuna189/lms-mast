<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class StudentCourseworkModel extends Model
{
    protected $table = 'student_coursework';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function coursework()
    {
        return $this->hasOne(CourseworkModel::class, 'id', 'coursework_id');
    }
}
