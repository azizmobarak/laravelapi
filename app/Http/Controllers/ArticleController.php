<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class ArticleController extends Controller
{
    function list(){
      return Article::all();
   }
   function some(){
       return Article::all();
   }
}
