<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;
    // public function projects()
    // {
    //     // to display name insted  of id
    //     return $this->belongsTo(Projects::class, 'project_id', 'id');
    // }
    public function activities()
    {

        return $this->hasMany(Activity::class, 'activity_id', 'id');
    }
    public function questions()
    {

        return $this->hasMany(Questions::class, 'question_id', 'id');
    }

}
