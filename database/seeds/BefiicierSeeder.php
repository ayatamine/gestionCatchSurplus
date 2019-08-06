<?php

use Illuminate\Database\Seeder;

class BefiicierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        \App\Benificier::create([
            'name' => 'اسم المستفيد',
            'file_number' =>  'رقم الملف',
            'id_number' => 'رقم الهوية',
            'phone_number' => 'رقم الجوال',
            'note' =>'ملاحظات'
        ]);
    }
}
