<?php

namespace App\Http\Controllers;

use Excel;
use Session;
use App\User;
use App\Setting;
use App\Benificier;
use App\ImportBenificier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index(){
        $settings = Setting::find(1);
        return view ('admin.home')->with('settings',$settings);
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
    public function Beneficiaries(){
        $settings = Setting::find(1);
        $benificieries = Benificier::orderBy('created_at','desc')->get();
        return view('admin.Beneficiaries',compact('settings','benificieries'));
    }
    public function createBenificier(Request $request){
       
        Benificier::create([
           'name'=>$request->name,
           'file_number'=>$request->file_number,
           'id_number'=>$request->id_number,
           'phone_number'=>$request->phone_number,
           'note'=>($request->note ) ? ($request->note) : '',
        ]);
        Session::flash('success','تم التسجيل بنجاح');
        return redirect()->back();
    }
    public function delete_benificier($id){
        $ben =Benificier::findorfail($id);
        $ben->delete();
        Session::flash('success','تم الحدف ');
        return redirect()->back();
    }
    public function exportexcel(){
        $benificieries = Benificier::orderBy('id','asc')->get();
        /*
        $ben_array[] = array('رقم الملف','اسم المستفيد','رقم الهوية','رقم الجوال','ملاحظة');
        foreach ($benificieries as $b) {
           $ben_array [] = array(
            'رقم الملف' =>$b->file_number,
            'اسم المستفيد' =>$b->name,
            'رقم الهوية' =>$b->id_number,
            'رقم الجوال' =>$b->phone_number,
            'ملاحظة'   =>$b->note
           );
        }
   
        Excel::create('قائمة المستفيدين',function($excel) use (
            $ben_array){
                $excel->setTitle('قائمة المستفيدين');
                $excel->sheet('قائمة المستفيدين',function($sheet) use ($ben_array){
                    $sheet->fromArray($ben_array,null,'A1',false,false);
                });
            })->download('xlsx');
         */


        return (new Benificier)->download('Benificier.xlsx');
    }
    public function importexcel(){
        //(new ImportBenificier)->import(public_path('imported_files\ben.xlsx'), 'local', \Maatwebsite\Excel\Excel::XLSX);
        Excel::import(new ImportBenificier,request()->file('file'));
        return redirect()->back();
    }
    public function registerpage(){
        return view('admin.register');
    }
    public function Supervisorpage(){
        $users = User::orderby('created_at','desc')->get();
        $settings = Setting::find(1);
        return view('admin.supervisor',compact('users','settings'));
    }
    public function update_admin(Request $request){
        $user = User::find(1);
        $user->name = ($request->name) != "" ? ($request->name) : $user->name;
        $user->email = $request->email;
        $user->password =  ($request->password) != "" ? ($request->password) : $user->password;;
        $user->save();
        return redirect()->back();
    }
    public function register_supervison(Request $request){
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->back();
    }
    public function make_admin($id){
       $user = User::findorfail($id);
       $user->admin = true;
       $user->save();
       Session::flash('success','تم تعيينه كمشرف');
       return redirect()->back();
    }
    public function make_non_admin($id){
       $user = User::findorfail($id);
       $user->admin = false;
       $user->save();
       Session::flash('success','تم إزالة التعيين كمشرف');
       return redirect()->back();
    }
    public function delete_supervisor($id){
        $user = User::findorfail($id);
        $user->delete();
        Session::flash('success','تم حدف المشرف');
        return redirect()->back();
    }
}
