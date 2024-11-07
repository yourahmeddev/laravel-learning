<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //using soft Delete here
    use SoftDeletes;
    protected $fillable = ['title' , 'user_id', 'description', 'is_active', 'is_publish', 'deleted_at'];

    public function User(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
