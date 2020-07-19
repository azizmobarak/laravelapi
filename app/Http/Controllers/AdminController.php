<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Admin;

class AdminController extends Controller
{
  //create admin
function createadmin(Request $request){
    $email=$request->email;
    $password=$request->password;
      if(gettype($email)!="NULL" && gettype($password)!="NULL"){
        $admin = new Admin;
        $admin->admin=$email;
        $admin->password=$password;

        $admin->save();

        return response()->json([
          'success'=>'Created'
        ]);
      }else{
        return response()->json([
            'success'=>'Error'
          ]);
      }
}

//login
function adminlogin(Request $request){
    $email=$request->email;
    $password=$request->password;

    if(gettype($email)!="NULL" && gettype($password)!="NULL"){
        $pass=Admin::where('admin',$email)->get('password');
       if(count($pass)>0){
        if($pass[0]->password==$password){
            return response()->json([
             'success'=>'ok',
             'email'=>$email
            ]);
          }else{
              return response()->json([
                'success'=>'Not Authorized'
              ]);
          }
       }else{
        return response()->json([
            'success'=>'Not Authorized'
          ]);
       }
    }else{
        return response()->json([
            'success'=>'Error'
          ]);
    }
}
}
