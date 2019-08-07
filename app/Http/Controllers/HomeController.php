<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Benificier;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::find(1);
        return view('benificiers',compact('settings'));
    }
    public function search_benificier(){
        $id_number = $_GET['id_number'];
        $file_number = $_GET['file_number'];
        $ben = Benificier::where('id_number',$id_number)
                           ->orWhere('file_number',$file_number)
                           ->get()->first();
    
        if($ben){
            return array(
                  'res'=>'yes',
                 'ben'=>$ben
            );
        }else{
            return array(
                 'res'=>'no',
                 'ben'=>null
            );
        }
    }
}
