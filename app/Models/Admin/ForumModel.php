<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class ForumModel extends Model
{
    protected $table = 'forum';
    protected $guarded = ['id'];

    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
