<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentcourse extends Model
{
    use HasFactory;
    protected $primaryKey = 'stcourse_id';
    protected $guarded = [];

    public function courserelation()
    {
        return $this->belongsto(Course::class,'course_id','course_id');
    }
     public function studentrelation()
    {
        return $this->belongsto(Student::class,'student_id','student_id');
    }
}
