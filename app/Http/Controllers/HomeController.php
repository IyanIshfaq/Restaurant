<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    function index()
    {
      $data=Food::all();
      $data2=Chef::all();
      if(auth::id())
      {
       return redirect('/login');
      }
      else
      {
      return view("home",compact("data","data2"));
      }
    }

    function redirect()
    {
      $data=Food::all();
      $data2=Chef::all();
      $usertype=Auth::user()->usertype;
       if($usertype=="1")
       {
        return view("admin.adminhome");
       }
       else
       {
          $user_id=Auth::id();
          $count=Cart::where("user_id",$user_id)->count();
          return view("home",compact("data","data2","count"));
       }
      
    }
    function addcart(Request $req ,$id)
    {
     if(Auth::id())
     {
       $user_id=Auth::id();
       $food_id=$id;
       $quantity=$req->quantity;
       $data=new Cart();
       $data->user_id=$user_id;
       $data->food_id=$food_id;
       $data->quantity=$quantity;
       $data->save();

       

       return redirect()->back();
     }
     else{
       return redirect('/login');
     }
    }
    function showcart(Request $req ,$id)
    {
      if(Auth::id()==$id)
      {
        $count=Cart::where("user_id",$id)->count();
        $data=Cart::where("user_id",$id)->join("food" , "carts.food_id", '=' ,"food.id")->get();
        return view("showcart",compact("count","data"));
      }
      else{
        return redirect()->back();
      }
     
    }
    function remove($id)
    {
      
      //  $data=cart::select('*')->find($id);
      //  $data->delete();
       return redirect()->back();
    }
    function orderconfirm(Request $req)
    {
      foreach($req->foodname as $key=>$foodname)
      {
        $data=new Order();
        $data->foodname=$foodname;
        $data->price=$req->price[$key];
        $data->quantity=$req->quantity[$key];
        $data->name=$req->name;
        $data->email=$req->email;
        $data->phone=$req->phone;
        $data->adress=$req->address;
        $data->save();
      }
       
       return redirect()->back();
    }
}
