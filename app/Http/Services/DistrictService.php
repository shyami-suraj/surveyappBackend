<?php

namespace App\Http\Services;

use App\Models\Activity;
use App\Models\Districts;
use Illuminate\Http\Request;


class DistrictService
{

    public function all()
    {
        $districts = Districts::all();
        return $districts;

    }


}
