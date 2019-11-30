<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'title', 'training_method', 'batch', 'language', 'level', 'partner', 'address', 'from_Datetime', 
        'to_datetime', 'isRepeat'
    ];
}
