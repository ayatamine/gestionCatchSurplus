<?php

namespace App\Http\Controllers;

use Excel;
use Session;
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
        (new ImportBenificier)->import(public_path('imported_files\ben.xlsx'), 'local', \Maatwebsite\Excel\Excel::XLSX);
    }
    public function registerpage(){
        return view('admin.register');
    }
}
