<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $primaryKey = 'student_id';
    protected $guarded = [];


public function coursest()
{
    return $this->hasMany(StudentCourse::class,'student_id','student_id');
}
}
