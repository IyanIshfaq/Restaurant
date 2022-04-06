<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    function users()
    {   
      if(Auth::id())
      {

        $data=User::all();
        return view("admin.users",["data"=>$data]);
      }
      else
      {
        return redirect('/login');
      }
    }
    function deleteuser($id)
    {
      if(Auth::id())
      {
        $remov=user::find($id);
        $remov->delete();
        return redirect()->back();
      }
      else
      {
        return redirect('/login');
      }
    }
    function foodmenu()
    {
      if(Auth::id())
      {

        $data=Food::all();
        return view("admin.food",compact("data"));
      }
      else
      {
        return redirect('/login');
      }
        
    }
    function upload(Request $req)
    {
      
        $data=new Food();

        if($req->hasfile('image'))
        {
            $image=$req->image;
            $imagename=time().".".$image->getClientOriginalExtension();
          $req->image->move("foodimage",$imagename);
          $data->image=$imagename;
        }

        $data->title=$req->title;
        $data->price=$req->price;
        $data->description=$req->description;
        $data->save();

        return redirect()->back();
 
    }
    function deletefood($id)
    {
        $data=Food::find($id);
        $data->delete();
        return redirect()->back();
    }
    function updateview($id)
    {
        $data=Food::find($id);
        return view("admin.updateview",compact("data"));
    }
    function update(Request $req,$id )
    {
        $data=Food::find($id);
        if($req->hasfile('image'))
        {
            // $destnation='/foodimage'.$data->image;
            // if(File::exists($destnation))
            // {
            //     File::delete($destnation);
            // }
            $image=$req->file('image');
            $imagename=time().".".$image->getClientOriginalExtension();
          $req->image->move("foodimage",$imagename);
          $data->image=$imagename;
        }
     

      $data->title=$req->title;
      $data->price=$req->price;
      $data->description=$req->description;
      $data->update();
      return redirect()->back();
    }

  function reservation(Request $req)
    {
        $data=new Reservation();

        $data->name=$req->name;
        $data->email=$req->email;
        $data->phone=$req->phone;
        $data->guest=$req->guest;
        $data->date=$req->date;
        $data->time=$req->time;
        $data->message=$req->message;

        $data->save();

        return redirect()->back();
 
    }
    function viewreservation()
    {   
      if(Auth::id())
      {
       $data=reservation::all();
        return view("admin.reservation",compact("data"));
      }
      else
      {
        return redirect('/login');
      }
    }
    function viewchef()
    {   
      if(Auth::id())
      {
       $data=Chef::all();
        return view("admin.chef",compact("data"));
      }
      else
      {
        return redirect('/login');
      }
    }
    function uploadchef(Request $req)
    {
        $data=new Chef();

        if($req->hasfile('image'))
        {
            $image=$req->image;
            $imagename=time().".".$image->getClientOriginalExtension();
          $req->image->move("chefimage",$imagename);
          $data->image=$imagename;
        }

        $data->name=$req->name;
        $data->speciality=$req->speciality;
        $data->save();

        return redirect()->back();
 
    }
   
  function updatechef($id)
  {
      $data=Chef::find($id);
      return view("admin.updatechef",compact("data"));
  }

  function updatefoodchef(Request $req,$id )
  {
      $data=Chef::find($id);
      if($req->hasfile('image'))
      {
        //   $destnation='/chefimage'.$data->image;
        //   if(File::exists($destnation))
        //   {
        //       File::delete($destnation);
        //   }
          $image=$req->file('image');
          $imagename=time().".".$image->getClientOriginalExtension();
        $req->image->move("chefimage",$imagename);
        $data->image=$imagename;
      }
   

    $data->name=$req->name;
    $data->speciality=$req->speciality;
    $data->update();
    return redirect()->back();
  }
  function deletechef($id )
  {
      $data=Chef::find($id);
      $data->delete();
    return redirect()->back();
  }
  function vieworder( )
  {
    if(Auth::id())
    {
      $data=Order::all();
    return view('admin.order',compact('data'));
  }
  else
  {
    return redirect('/login');
  }
  }
  function search(Request $req)
  {
    $search=$req->search;
      $data=Order::where("name","like",'%'.$search.'%')->orwhere("foodname","like",'%'.$search.'%')->get();
    return view('admin.order',compact('data'));
  }
}
