<?php

namespace App\Http\Services;

use App\Models\Projects;
use Illuminate\Http\Request;


class ProjectsService
{

    public function all()
    {
        $Project = Projects::all();
        return $Project;
    }

    public function getItem($id)
    {
        $Project = Projects::where('id', $id)->first();
        return $Project;
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

        $Project = new Projects();

        $Project->name = $request->input('name');
        $Project->save();


        try {


            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Inserting Record'];
        }
    }
    public function update(Request $request, $id)
    {
        $Project = Projects::where('id', $id)->first();

        if (!empty($request->input('name'))) {
            $name  = $request->input('name');
            $Project->name  = $name ;
        }

        $Project->save();
    try {



            return ['status' => 'success', 'msg' => ''];
        } catch (\Exception $e) {
            return ['status' => 'error', 'msg' => 'Error Updating Record'];
        }
    }



    public function delete_status($id)
    {
        $Project = Projects::where('id', $id)->first();
        $Project->del_status=1;
        $Project->save();
        return ['status' => 'success', 'msg' => ''];
    }
}
