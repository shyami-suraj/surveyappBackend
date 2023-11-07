<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    public function projects()
    {
        // to display name insted  of id
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }
        public function questionmappers()
        {
            // to display name insted  of id
            return $this->hasMany(QuestionMapper::class, 'question_id', 'id');
        }

}
