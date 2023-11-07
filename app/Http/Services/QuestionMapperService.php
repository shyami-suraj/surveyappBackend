<?php

namespace App\Http\Services;

use App\Models\QuestionMapper;
use App\Models\Questions;
use Illuminate\Http\Request;


class QuestionMapperService
{

    public function all($params=[])
    {
        if(empty($params)){
            $Question_mapper = QuestionMapper::all();
            return $Question_mapper;
        }
        else{
            $Question_mapper = QuestionMapper::query();
            foreach($params as $key=>$val){

                $Question_mapper = $Question_mapper->where($key, $val);
            }
            $Question_mapper = $Question_mapper->get();
            return $Question_mapper;
        }





        // $Question_mapper = Question_mapper::all();
        // return $Question_mapper;
    }

    public function getItem($id)
    {
        $Question_mapper = QuestionMapper::where('id', $id)->first();
        return $Question_mapper;
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

        $Question_mapper = new QuestionMapper();
        $Question_mapper->project_id  = $request->input('project_id');
        $Question_mapper->activity_id  = $request->input('activity_id');
        $Question_mapper->question_id  = $request->input('question_id');
        $Question_mapper->order  = $request->input('order');

        $Question_mapper->save();


        try {


            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Inserting Record'];
        }
    }
    public function update(Request $request, $id)
    {
        $Question_mapper = QuestionMapper::where('id', $id)->first();

        if (!empty($request->input('project_id'))) {
            $project_id = $request->input('project_id');
            $Question_mapper->project_id  = $project_id ;
        }
        if (!empty($request->input('activity_id'))) {
            $activity_id = $request->input('activity_id');
            $Question_mapper->activity_id  = $activity_id ;
        }
        if (!empty($request->input('question_id'))) {
            $question_id = $request->input('question_id');
            $Question_mapper->question_id  = $question_id ;
        }
        if (!empty($request->input('order'))) {
            $order = $request->input('order');
            $Question_mapper->order  = $order ;
        }


                  $Question_mapper->save();




        try {



            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Updating Record'];
        }
    }


    // public function delete (Request $request, $id){
	// 	$Questions = Questions::where('id', $id)->first();
    //     $Questions->del_status = 1;
    //     // $data->last_updated_by = Auth::user()->id;
    //     // $data->last_updated_ip = $request->ip();
    //     // $data->last_updated_activity ="deleted";
    //     $Questions->save();
	// 	return ['status' => 'success', 'msg' => ''];
    // }
    public function delete_status($id)
    {
        $Question_mapper = QuestionMapper::where('id', $id)->first();
        $Question_mapper->del_status=1;
        $Question_mapper->save();
        return ['status' => 'success', 'msg' => ''];
    }
}
