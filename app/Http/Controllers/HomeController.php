<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function edituser($id){
     $data=User::findorfail($id);
  




     return view('edit',compact('data'));

    }

    public function updateuser (Request $request){

$user=Auth::user();
$request->validate([
          'name'=>'required',
          'email'=>'required|email|unique:users,email,'.$user->id,
          'hobby'=>'required',
      ]);
      $use=User::find($user->id);
      if($request->file('image')){
             $file= $request->image;

            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $use->image=$filename;
      }
      $use->name=$request->name;
      $use->email=$request->email;
      $use->hobby=implode(',',$request->hobby);
      $use->save();
      return redirect()->route('home')->with('success','Profile Updated Successfully');;




    }
}
