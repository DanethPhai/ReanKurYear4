<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'subject_id',
        'level',
        'price',
        'time',
        'term',
        'detail',
    ];


    // has many relation

    public function comments() {
       return $this->hasMany(Comment::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
     }

    public function teacher() {
        return $this->belongsTo(Teacher::class);
    }

    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
