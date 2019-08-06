<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use App\Setting;
class AdminController extends Controller
{
    
    public function index(){
        $settings = DB::select('select * from settings where id = 1');
        return view ('admin.home')->with('settings',$settings[0]);
    }
    public function updateSiteSettings(Request $request){
          //dd($request);
          $this->validate($request,[
             'name'=>'required',
          ]);
          $name = $request->name;
          $email = $request->email | '';
          
          $settings = Setting::find(1);
          
          $logo=$request->logo;
          if($logo){
              $fich=time().$logo->getClientOriginalName();
              $logo->move(public_path('img/'),$fich);
          }else{
              $fich=$settings->logo;
          }
           
           $settings->site_name = $name;
           $settings->site_email = $email;
           $settings->logo = $fich;
           $settings->save();
           Session::flash('success','تم تغيير الإعدادات بنجاح');
           return redirect()->back();
    }
}
