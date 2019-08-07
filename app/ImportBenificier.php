<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Benificier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Session;
class ImportBenificier implements ToModel
{
    use Importable;

    public function model(array $row)
    {   
        //dd($row);
        $beni = Benificier::all()->pluck('id_number')->toArray();
        
        if(in_array($row[3] , $beni)){
            Session::flash('error','هناك بعض البيانات مكررة تم تسجيلها من قبل');
        }else{

        
        return new Benificier([
            'name' => $row[1],
            'file_number' =>  $row[2],
            'id_number' => $row[3],
            'phone_number' => $row[4],
            'note' =>$row[5]
        ]);
        }
      
    }
}
