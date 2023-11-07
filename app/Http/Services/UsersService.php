<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Http\Request;


class UsersService
{

    public function all($params=[])
    {

        if(empty($params)){
            $users = User::all();
            return $users;
        }
        else{
            $users = User::query();
            foreach($params as $key=>$val){

                $users = $users->where($key, $val);
            }
            $users = $users->get();
            return $users;
        }

    }

    public function getItem($id)
    {
        $users = User::where('id', $id)->first();
        return $users;
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

        $users = new User();
        $users->name = $request->input('name');
        $users->phone = $request->input('phone');
        $users->password = $request->input('password');
        $users->country = $request->input('country');
        $users->district_id = $request->input('district_id');
        $users->project_id = $request->input('project_id');
        $users->activity_id = $request->input('activity_id');
        $users->user_type = $request->input('user_type');

        $users->save();


        try {


            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Inserting Record'];
        }
    }
    public function update(Request $request, $id)
    {
        $users = User::where('id', $id)->first();

        if (!empty($request->input('name'))) {
            $name  = $request->input('name');
            $users->name  = $name ;
        }
        if (!empty($request->input('phone'))) {
            $phone  = $request->input('phone');
            $users->phone  = $phone ;
        }
        if (!empty($request->input('password'))) {
            $password  = $request->input('password');
            $users->password  = $password ;
        }
        if (!empty($request->input('country'))) {
            $country  = $request->input('country');
            $users->country  = $country ;
        }
        if (!empty($request->input('district_id'))) {
            $district_id  = $request->input('district_id');
            $users->district_id  = $district_id ;
        }
        if (!empty($request->input('project_id'))) {
            $project_id  = $request->input('project_id');
            $users->project_id  = $project_id ;
        }
        if (!empty($request->input('activity_id'))) {
            $activity_id  = $request->input('activity_id');
            $users->activity_id  = $activity_id ;
        }


        $users->save();
    try {



            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Updating Record'];
        }
    }



    public function delete_status($id)
    {
        $users = User::where('id', $id)->first();
        $users->del_status=1;
        $users->save();
        return ['status' => 'success', 'msg' => ''];
    }
}
