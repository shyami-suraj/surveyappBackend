<?php

namespace App\Http\Services;

use App\Models\QuestionMapper;
use App\Models\Questions;
use App\Models\User;
use Illuminate\Http\Request;


class QuestionsService
{

    public function all()
    {
        $Questions = Questions::all();
        return $Questions;
    }
    public function forntendquestion($id)
    {
        $user = User::find($id);
        $Questions = QuestionMapper::where('activity_id',$user->activity_id)->where('project_id',$user->project_id)->join('questions','questions.id','=','question_id')->where('questions.status','1')->select('questions.*')->get();
        return $Questions;
    }

    public function getItem($id)
    {
        $Questions = Questions::where('id', $id)->first();
        return $Questions;
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

        $Questions = new Questions();
        $Questions->question  = $request->input('question');
        $Questions->slug = $request->input('slug');
        $Questions->type = $request->input('type');
        $Questions->option  = $request->input('option');
        $Questions->class_name  = $request->input('class_name');
        $Questions->answer_column  = $request->input('answer_column');
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $Questions->image = $imageName;
        $Questions->status  = $request->input('status');

        $Questions->save();


        try {


            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Inserting Record'];
        }
    }
    public function update(Request $request, $id)
    {
        $Questions = Questions::where('id', $id)->first();

        if (!empty($request->input('question'))) {
            $question = $request->input('question');
            $Questions->question  = $question ;
        }

        if (!empty($request->input('slug'))) {
            $slug  = $request->input('slug');
            $Questions->slug  = $slug ;
        }

        if (!empty($request->input('type'))) {
            $type = $request->input('type');
            $Questions->type = $type;
        }

            $option = $request->input('option');
            $Questions->option = $option;



        if (!empty($request->input('answer_column'))) {
            $answer_column = $request->input('answer_column');
            $Questions->answer_column  = $answer_column ;
        }
        if (!empty($request->image)) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $Questions->image = $imageName;
        }

            $status = $request->input('status');
            $Questions->status = $status ;



        $Questions->save();




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
        $Questions = Questions::where('id', $id)->first();
        $Questions->del_status=1;
        $Questions->save();
        return ['status' => 'success', 'msg' => ''];
    }
}
