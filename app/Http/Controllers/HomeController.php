<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CatchSurplus;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('home');
    }
    public function add_catch(Request $request){
         $this->validate($request,[
             'name'=>'string',
             'date'=>'required',
             'total'=>'required',
         ]);
         
         $catch_surplus = CatchSurplus::create([
             'name'=>$request->name ,
             'phone'=>$request->phone ,
             'age'=>$request->age ,
             'date'=>$request->date ,
             'total'=>$request->total ,
             'payed'=>$request->payed ,
             'rest'=>$request->rest ,
             'details'=>$request->details ,
             'editor'=>$request->editor ,
             'added1'=>$request->added1 ,
             'added2'=>$request->added2 ,
             'added3'=>$request->added3 ,
             'added4'=>$request->added4 ,
             'added5'=>$request->added5 
         ]);
         return view('printdetails',compact('catch_surplus'));
    }
    public function editCach($id){
        $catch_surplus = CatchSurplus::findorfail($id);
        return view('editCatch_surplus',compact('catch_surplus'));
    }
    public function update_Catch(Request $request,$id){
        $this->validate($request,[
            'name'=>'string',
            'total'=>'required',
        ]);
         $catch_surplus = CatchSurplus::findorfail($id);

         $catch_surplus->name = $request->name ? $request->name : $catch_surplus->name;
         $catch_surplus->phone = $request->phone ? $request->phone : $catch_surplus->phone;
         $catch_surplus->age = $request->age ? $request->age :$catch_surplus->age;
         $catch_surplus->date = $request->date ? $request->date :   $catch_surplus->date;
         $catch_surplus->total = $request->total ? $request->total :$catch_surplus->total;
         $catch_surplus->payed = $request->payed ? $request->payed : $catch_surplus->payed;
         $catch_surplus->rest = $request->rest ? $request->rest : $catch_surplus->rest;
         $catch_surplus->details = $request->details ? $request->details : $catch_surplus->details;
         $catch_surplus->editor = $request->editor  ? $request->editor :$catch_surplus->editor;
         $catch_surplus->added1 = $request->added1 ? $request->added1 :$catch_surplus->added1;
         $catch_surplus->added2 = $request->added2 ? $request->added2 :$catch_surplus->added2;
         $catch_surplus->added3 = $request->added3 ? $request->added3 :$catch_surplus->added3;
         $catch_surplus->added4 = $request->added4 ? $request->added4 :$catch_surplus->added4;
         $catch_surplus->added5 = $request->added5 ? $request->added5 :$catch_surplus->added5;
         $catch_surplus->save();

        return view('printdetails',compact('catch_surplus'));
    }
    public function clientlist(){
        $clientlist = CatchSurplus::latest()->get();
        return view('clientlist',compact('clientlist'));
    }
    public function deleteclient(){
         $clientid=  $_GET['clientid'];
         $client = CatchSurplus::findorfail($clientid);
         $client->delete();
         return response()->json(['data'=>'تم المسح']);
    }
    public function payrest(){
         $clientid=  $_GET['clientid'];
         $payed = $_GET['payed'];
         $client = CatchSurplus::findorfail($clientid);
         $client->payed = $client->payed + $payed;
         $client->rest = $client->rest - $payed;
         $client->save();
         return response()->json(['data'=>'تم السداد',
         'payed'=>$client->payed,'rest'=>$client->rest]);
    }
}
