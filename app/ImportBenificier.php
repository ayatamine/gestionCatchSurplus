<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Benificier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
class ImportBenificier implements ToModel
{
    use Importable;

    public function model(array $row)
    {   
        dd($row);
        return new Benificier([
            'name' => $row[0],
            'file_number' =>  'رقم الملف',
            'id_number' => 'رقم الهوية',
            'phone_number' => 'رقم الجوال',
            'note' =>'ملاحظات'
        ]);
    }
}
