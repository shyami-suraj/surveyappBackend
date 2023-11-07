<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\QuestionsService;


class QuestionController extends Controller
{
    public $service;
    public function __construct()
    {

        $this->service = new QuestionsService();
    }
    public function index($id)
    {

        $question = $this->service->forntendquestion($id);
        return response()->json(['status'=>'success','msg'=>'','data'=> $question]);

    }
}
