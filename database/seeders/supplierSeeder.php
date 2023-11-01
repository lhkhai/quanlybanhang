<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class supplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i=0;$i<=1000;$i++)
        {
            \DB::table('suppliers')->insert(['mancc'=> \Str::random(15),'tenncc'=> 'Nhà Cung cấp '.$i,
            'diachincc'=> 'Địa chỉ nhà cung cấp '.$i,'sdtncc'=> '09'.rand(000000000,99999999),'emailncc'=>'emailnhacungcap'.$i."@gmail.com",
            'ttthanhtoan'=> 'Phương thức, thông tin thanh toán của nhà cung cấp','ghichu'=>"Ghi chú các thông tin liên quan đến nhà cung cấp",'created_at'=> Carbon::now()]);
        }
    }
}
