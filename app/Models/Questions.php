<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    // public function question()
    // {
    //     // to display name insted  of id
    //     return $this->belongsTo(Questions::class, 'question_id', 'id');
    // }
    public function activities()
    {

        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
    public function project()
    {
        // to display name insted  of id
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }
    public function user()
    {
        // to display name insted  of id
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function questionmappers()
    {
        // to display name insted  of id
        return $this->hasMany(QuestionMapper::class, 'question_id', 'id');
    }
}
