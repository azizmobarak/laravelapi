<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\models\User;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    function verifytoken(Request $request){
      $token = $request->header('Authorization');
      if(gettype($token)=="NULL"){
          return "false";
      }else{
         $id = User::where('remember_token',$token)->get("id");
         if(count($id)==0)
         {
             return "false";
         }else{
            return $id[0]->id;
         }
      }
    }
}
