<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory,softDeletes;

    protected $guarded = [];
    protected $primaryKey = 'course_id';



public function stcourse()
{
    return $this->hasMany(StudentCourse::class,'course_id','course_id');
}

}
