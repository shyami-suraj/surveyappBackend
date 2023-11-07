<?php

namespace App\Http\Controllers;

use App\Http\Services\UsersService;
use App\Http\Services\ActivitiesService;
use App\Http\Services\ProjectsService;
use App\Http\Services\DistrictService;
use App\Models\Activity;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $service;
    public $activity_service;
    public $project_service;
    public $district_service;

    public function __construct(){

       $this->service = new UsersService();
       $this->activity_service = new ActivitiesService();
       $this->project_service = new ProjectsService();
       $this->district_service = new DistrictService();
    }
    public function index()
    {
        $user = $this->service->all(['del_status'=>'0','user_type'=>'BP']);

        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $activities = $this->activity_service->all();
        // $projects = $this->project_service->all();
        $data['projects']=Projects::get(['name','id']);

        $districts = $this->district_service->all();



        return view('users.create',$data,compact('activities','districts'));
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

            $addprojects = $this->service->insert($request);
        }
        else{
            $addprojects = $this->service->update($request,$id);
        }

        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user =  User::find($id);
        $activities = $this->activity_service->all();
        $data['projects']=Projects::get(['name','id']);
        // $projects = $this->project_service->all();
        $districts = $this->district_service->all();

        return view('users.edit',$data,compact('user','activities','districts'));
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
        return redirect()->route('admin.users.index');
    }

}
