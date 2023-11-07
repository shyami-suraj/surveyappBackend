<?php

namespace App\Http\Controllers;

use App\Http\Services\ProjectsService;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public $service;
    public function __construct(){

       $this->service = new ProjectsService();
    }
    public function index()
    {
        $project = $this->service->all()->where('del_status' , 0);
        return view('projects.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $project = Projects::All();
        return view('projects.create',compact('project'));
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

        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $project =  Projects::find($id);

        return view('projects.edit',compact('project'));
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
        return redirect()->route('admin.projects.index');
    }

}
