<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;
use Illuminate\Support\Facades\Auth;
use Throwable;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    function newuser(Request $request){
   try{
    if( gettype($request->name)!="NULL" && gettype($request->email)!="NULL" && gettype($request->password)!="NULL")
    {
        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password=$request->password;
        $user->save();
        return response()->json([
            'status'=>'ok'
        ],201);
    }else{
        return response()->json([
            'success'=>'please verify the entred data , should not be null or empty'
        ],406);
    }
}catch(Throwable $e){
return response()->json([
    'success'=>"no"
],405);
}
    }

function userlogin(Request $request){
  try{
    $password = $request->password;
    $email = $request->email;
     if(gettype($password)!=="NULL" && gettype($email)!=="NULL")
     {
         $user = User::where('email',$email)->get('password');
     if($user[0]->password==$password){
       $token =hash('sha256',Str::random(60));
       User::where('email',$email)->update(['remember_token'=>$token]);
         return response()->json([
             'success'=>'ok',
             'token'=>$token
         ],202);
     }else{
         return response()->json([
             'success'=>'no'
         ],203);
     }
     }else{
         return response()->json([
            "success"=>'please enter valide data'
         ],406);
     }
  }catch(Throwable $e){
    return response()->json([
        "success"=>"Error try again"
    ],405);
  }
}

}
