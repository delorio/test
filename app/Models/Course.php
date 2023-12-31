<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';
    protected $primaryKey = "course_id";

    protected $fillable = [
        'course_id',
        'name',
        'description',

    ];



    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'course_id', 'course_id');
    }



}
