<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\SurveyService;
use Illuminate\Http\Request;

class SurveyController extends Controller
{


    public $service;
    public function __construct()
    {

        $this->service = new SurveyService();
    }

    public function insert(Request $request)
    {

        $survey=$this->service->insert($request);
        return response()->json(['status'=>'success','msg'=>'','data'=> $survey]);

    }

}
