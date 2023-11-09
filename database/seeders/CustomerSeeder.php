<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        for($i=1;$i<=100;$i++){
        \DB::table('customers')->insert(['makh'=>'MANCC'.$i,'tenkh'=>'Khách hàng thứ '.$i,'diachi'=>'Số '.$i. 'Ninh Kiều, Cần Thơ ',
        'sdt'=>'0'.rand(2,9).rand(00000000,99999999),'email'=>'emailkhachhang'.$i.'@gmail.com','created_at'=>Carbon::now()]);
        }
    }
}
