<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Question  extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'content',
        'a',
        'b',
        'c',
        'd',
        'correct_answer',
        'level',
    ];
}
