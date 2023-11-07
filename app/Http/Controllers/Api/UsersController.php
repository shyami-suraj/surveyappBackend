<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Services\UsersService;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public $service;
    public function __construct()
    {

        $this->service = new UsersService();
    }
    public function index()
    {
        $user = $this->service->all(['del_status' => '0', 'user_type' => 'BP']);
        return response()->json(['status'=>'success','msg'=>'','data'=> $user]);

    }
    public function login(Request $request){

        if(!Auth::attempt($request->only(['phone', 'password']))){
            return response()->json([
                'status' => 'false',
                'message' => 'phone & Password does not match with our record.',
            ]);
        }

        $user = User::where('phone', $request->phone)->first();
        $token=$user->createToken("API TOKEN")->plainTextToken;
        $user->save();


        return response()->json([
            'status' => 'success',
            'message' => 'User Logged In Successfully',
            'token' =>  $token,
            'user_id'=>$user->id,

        ], 200);
    }
    public function getProfile(Request $request,$id){
        $user= User::where('id',$id)->first();
    return response()->json(['status'=>'success','msg'=>'','data'=> ['user'=>$user, 'activity'=>$user->activities->name, 'project'=>$user->project->name]]);
    }
}
