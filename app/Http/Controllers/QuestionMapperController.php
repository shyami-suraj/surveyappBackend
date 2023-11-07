<?php

namespace App\Http\Controllers;

use App\Http\Services\ActivitiesService;
use App\Http\Services\ProjectsService;
use App\Http\Services\QuestionMapperService;
use App\Http\Services\QuestionsService;
use App\Models\Activity;
use App\Models\Projects;
use App\Models\QuestionMapper;
use Illuminate\Http\Request;

class QuestionMapperController extends Controller
{
    public $service;

    public $activity_service;
    public $project_service;
    public $question_service;

    /**
     * Display a listing of the resource.
     */
    public function __construct(){

        $this->service = new QuestionMapperService();
        $this->question_service = new QuestionsService();


        $this->activity_service = new ActivitiesService();
        $this->project_service = new ProjectsService();



     }

    public function index()
    {

        $question_mappers = $this->service->all()->where('del_status', 0);
        return view('question_mapper.index', compact('question_mappers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activities = $this->activity_service->all();
        $questions = $this->question_service->all();
        // print_r($questions);
        // die();

        $data['projects']=Projects::get(['name','id']);

        return view('question_mapper.create',$data,compact('activities','questions'));

    }
    public function fetchActivity(Request $request){
        $data['activity']= Activity::where('project_id',$request->project_id)->get(['name','id']);
        return response()->json($data);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('id');

        if(empty($id)){

            $addquestions_mappers = $this->service->insert($request);
        }
        else{
            $addquestions_mappers = $this->service->update($request,$id);
        }

        return redirect()->route('admin.question_mapper.index');
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question_mappers =  QuestionMapper::find($id);
        $questions = $this->question_service->all();

        $activities = $this->activity_service->all();
        $data['projects']=Projects::get(['name','id']);
        return view('question_mapper.edit',$data, compact('question_mappers','activities','questions'));
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy_status($id)
    {
        $this->service->delete_status($id);
        return redirect()->route('admin.question_mapper.index');
    }
}
