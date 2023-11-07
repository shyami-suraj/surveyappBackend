<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surveys extends Model
{
    use HasFactory;
    public function activities()
    {

        return $this->belongsTo(Activity::class, 'activity_id', 'id');
    }
    public function project()
    {
        // to display name insted  of id
        return $this->belongsTo(Projects::class, 'project_id', 'id');
    }
}
