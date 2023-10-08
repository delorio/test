<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;


    protected $table = 'lessons';
    protected $primaryKey = "lesson_id";

    protected $fillable = [
        'lesson_id',
        'name',
        'description',
        'course_id'
    ];
    public function course()
    {
        return $this->hasMany(Course::class, 'course_id', 'course_id');
    }
}
