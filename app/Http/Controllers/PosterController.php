<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poster;

class PosterController extends Controller
{
  function getposts(){
    $data = new Poster;
    $data->username = "otherone";
    $data->email="otherone@test";
    if($data!==null){
        $data->save();
        return $data;
    }else{
        $data=["not found",'404'];
        return $data;
       }
  }
}
