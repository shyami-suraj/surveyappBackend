<?php

namespace App\Http\Controllers;

use App\Http\Services\ActivitiesService;
use App\Http\Services\ProjectsService;
use App\Http\Services\SurveyService;
use App\Models\Projects;
use App\Models\Activity;

use App\Models\QuestionMapper;
use App\Models\surveys;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $service;
    public $activity_service;
    public $project_service;
    public function __construct()
    {

        $this->service = new SurveyService();
        $this->activity_service = new ActivitiesService();
        $this->project_service = new ProjectsService();
    }

    public function index()
    {
        $survey = '';
        $question='';
        $answer='';
        $data['projects']=Projects::get(['name','id']);
        return view('survey.index',$data, compact('survey','question','answer'));

        // return view('survey.index',$data, compact('survey'));

    }
    public function fetchActivity(Request $request){
        $data['activity']= Activity::where('project_id',$request->project_id)->get(['name','id']);
        return response()->json($data);
    }
    public function filter(Request $request){
        // print_r($request->activity_id);
        // die();
        $survey = Surveys::all();
        $data['projects']=Projects::get(['name','id']);

        $qm = QuestionMapper::where('project_id', $request->project_id)
            ->where('activity_id', $request->activity_id)->
            get();



            $question=[];
            $answer=[];
            foreach($qm as $q){
                $question[] = $q->questions->slug;
                $answer[] = $q->questions->answer_column;

            }



        if(!empty($request->project_id)){
            $survey=$survey->where('project_id',$request->project_id);
        }
        if(!empty($request->activity_id)){
            $survey=$survey->where('activity_id',$request->activity_id);
        }


        return view('survey.index',$data, compact('survey','question','answer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(surveys $surveys)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(surveys $surveys)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, surveys $surveys)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(surveys $surveys)
    {
        //
    }
}
