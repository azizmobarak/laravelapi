<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\Authenticate;
use App\models\Order;

class OrdersController extends Controller
{
    //create new order
    function createorder(Request $request,Authenticate $auth){
        $txt = $auth->verifytoken($request);
       if($txt=="false"){
           return response()->json([
            'success'=>'Not Authenticated'
           ],403);
       }
       else{
        $order =new Order;
       $order->price=$request->price;
        $order->user_id=$txt;
        $order->save();
           return response()->json([
               'success'=>'new order added'
           ],200);
       }
    }

    //get orders by user
    function userorders(Request $request,Authenticate $auth)
    {
        $txt = $auth->verifytoken($request);
        if($txt=="false"){
            return response()->json([
            'success'=>'Not Aythenticated'
            ]);
        }else{
            $orders =Order::where('user_id',$txt)
                           ->get();
                    return response()->json([
                        'success'=> 'ok',
                        'data' => $orders
                    ]);
        }
    }

}
