<?php

namespace App\Http\Services;

use App\Models\Activity;
use App\Models\QuestionMapper;
use App\Models\Surveys;
use Illuminate\Http\Request;


class SurveyService
{

    public function all()
    {

        $Surveys = Surveys::all();
        return $Surveys;

    }



    // public function getItem($id)
    // {
    //     $Surveys = Surveys::where('id', $id)->first();
    //     return $Surveys;
    // }
    public function insert(Request $request)
    {

        // print_r($request->all());
        // die;
        $Surveys = new Surveys();
        $Surveys->project_id = $request->input('project_id');
        $Surveys->activity_id = $request->input('activity_id');
        $Surveys->BP_id = $request->input('BP_id');
        $Surveys->name = $request->input('name');
        $Surveys->email = $request->input('email');
        $Surveys->phone = $request->input('phone');
        $Surveys->address = $request->input('address');
        $Surveys->gender = $request->input('gender');




        $actvity_questions = QuestionMapper::where('activity_id', $request->input('activity_id') )->get();

        foreach($actvity_questions as $actq){
            $answer_column = $actq->questions->answer_column;
            $Surveys->$answer_column = $request->input($answer_column);
        }
        $Surveys->save();

        try {


            return ['status' => 'success', 'msg' => '',$Surveys];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Inserting Record'];
        }
    }





}
