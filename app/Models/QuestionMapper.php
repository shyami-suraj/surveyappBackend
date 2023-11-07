<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionMapper extends Model
{
    use HasFactory;
    public function questions()
    {
        return $this->belongsTo(Questions::class, 'question_id', 'id');
    }

    public function activities(){
        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }

}
