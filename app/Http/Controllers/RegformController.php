<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Regform;


class RegformController extends Controller
{
   public function index()
   {
       $state=State::all();
       return view('reg',compact('state'));
   }
   public function select_state(Request $request)
   {
     $data=City::select('city','id')->where('state_id',$request->id)->take(100)->get();
     return response()->json($data);
   }
   public function register(Request $request)
   {
       $request->validate([
           'name' => 'required',
           'email' => 'required|email',
           'phone' => 'required|regex:/^([0-9\s\-\+\(\)])*$/|min:10'
       ]);
       $state=State::find('id')->where('id','state')->get();
       $reg=new Regform;
       $reg->name=$request->name;
       $reg->email=$request->email;
       $reg->phone=$request->phone;
       $reg->state=$request->state;
       $reg->city=$request->city;
       $reg->save();

       return redirect('home')->with('success','Data has been saved');


   }
   public function display()
   {
       $state=State::find('id','state');
       $city=City::all();
       $data=Regform::all();
       return view('display',['data'=>$data]);
   }
}
