<?php

namespace App\Http\Controllers;

use App\Http\Services\ActivitiesService;
use App\Http\Services\ProjectsService;
use App\Http\Services\QuestionsService;
use App\Models\Activity;
use App\Models\Projects;
use App\Models\Questions;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    private $answer_columns = [];
    /**
     * Display a listing of the resource.
     */
    public $service;
    public $activity_service;
    public $project_service;



    public function __construct(){

       $this->service = new QuestionsService();
       $this->activity_service = new ActivitiesService();
       $this->project_service = new ProjectsService();


       for($i=1;$i<=100;$i++){
        $this->answer_columns[] = 'A'.$i;
    }



    }
    public function index()
    {
        // $question = $this->service->all();
        $question = $this->service->all()->where('del_status' , 0);
        return view('questions.index', compact('question'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activities = $this->activity_service->all();
        // $projects = $this->project_service->all();
        $data['projects']=Projects::get(['name','id']);

        $used_answer_columns = Questions::pluck('answer_column')->toArray();
		$free_answer_columns = array_filter($this->answer_columns, function($item) use($used_answer_columns){ return !in_array($item, $used_answer_columns); });

        return view('questions.create',$data,compact('activities', 'free_answer_columns'));
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

            $addquestions = $this->service->insert($request);
        }
        else{
            $addquestions = $this->service->update($request,$id);
        }

        return redirect()->route('admin.questions.index');
    }


    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question =  Questions::find($id);
        $activities = $this->activity_service->all();
        // $projects = $this->project_service->all();
        $data['projects']=Projects::get(['name','id']);
        return view('questions.edit',$data, compact('question','activities'));
    }

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    // public function delete(Request $request, $id){
    //     $questions = Questions::where('id', $id)->first();
    //     $questions->del_status = 1;
    //     $questions->save();
    //     return redirect()->route('admin.questions.index', ['id'=>$request->input('return_url_id')]);


    //  }
    public function destroy_status($id)
    {
        $this->service->delete_status($id);
        return redirect()->route('admin.questions.index');
    }
}
