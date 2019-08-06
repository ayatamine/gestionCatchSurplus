<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class Benificier extends Model implements FromCollection
{
    use Exportable;

    public function collection()
    {
        $res = $this::all();
        $res->makeHidden(['created_at','updated_at']);

        $res->prepend(['id'=>'0', 'name' => 'اسم المستفيد',
            'file_number' =>  'رقم الملف',
            'id_number' => 'رقم الهوية',
            'phone_number' => 'رقم الجوال',
            'note' =>'ملاحظات']);
        return $res;
    }
   
    protected $fillable =['name','file_number','id_number','phone_number','note'];


}
