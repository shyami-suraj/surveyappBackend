<?php

namespace App\Http\Services;

use App\Models\Activity;
use Illuminate\Http\Request;


class ActivitiesService
{

    public function all($params=[])
    {

        if(empty($params)){
            $activities = Activity::all();
            return $activities;
        }
        else{
            $activities = Activity::query();
            foreach($params as $key=>$val){

                $activities = $activities->where($key, $val);
            }
            $activities = $activities->get();
            return $activities;
        }

    }

    public function getItem($id)
    {
        $Activities = Activity::where('id', $id)->first();
        return $Activities;
    }
    public function insert(Request $request)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'slug' => 'required',
        //     'detail' => 'required',
        //     'price' => 'required',
        //     'weight' => 'required',
        //     'featured' => 'required',
        //     'images' => 'required',

        //      // means the phone field should be unique in the users table.
        // ]);

        $Activities = new Activity();

        $Activities->name = $request->input('name');
        $Activities->project_id = $request->input('project_id');

        $Activities->save();


        try {


            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Inserting Record'];
        }
    }
    public function update(Request $request, $id)
    {
        $Activities = Activity::where('id', $id)->first();

        if (!empty($request->input('name'))) {
            $name  = $request->input('name');
            $Activities->name  = $name ;
        }
        if (!empty($request->input('project_id'))) {
            $project_id  = $request->input('project_id');
            $Activities->project_id  = $project_id ;
        }

        $Activities->save();
    try {



            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Updating Record'];
        }
    }



    public function delete_status($id)
    {
        $Activities = Activity::where('id', $id)->first();
        $Activities->del_status=1;
        $Activities->save();
        return ['status' => 'success', 'msg' => ''];
    }
}
