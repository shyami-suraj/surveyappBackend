<?php

namespace App\Http\Controllers;

use App\Http\Services\ActivitiesService;
use App\Http\Services\ProjectsService;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $service;
    public $project_service;
    public function __construct(){

       $this->service = new ActivitiesService();
       $this->project_service = new ProjectsService();
    }
    public function index()
    {
        $activity = $this->service->all(['del_status'=>'0']);

        return view('activities.index', compact('activity'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = $this->project_service->all();
        return view('activities.create',compact('projects'));
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

        return redirect()->route('admin.activities.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $activity =  Activity::find($id);
        $projects = $this->project_service->all();

        return view('activities.edit',compact('activity','projects'));
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
        return redirect()->route('admin.activities.index');
    }

}
