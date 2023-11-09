<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\carbon;
class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=100;$i++){
            \DB::table('customers')->insert(['makh'=>'MANCC'.$i,'tenkh'=>'Khách hàng thứ '.$i,'diachi'=>'Số '.$i. 'Ninh Kiều, Cần Thơ ',
            'sdt'=>'0'.rand(2,9).rand(00000000,99999999),'email'=>'emailkhachhang'.$i.'@gmail.com','created_at'=>Carbon::now()]);
            }
            for($i=0;$i<=100;$i++)
            {
                \DB::table('categories')->insert(['manhom'=> \Str::random(15),'tennhom'=> 'Nhóm sản phẩm '.$i,
                'diengiai'=> 'Diễn giải '.$i]);
            }
            \DB::table("products")->insert(['masp'=>\Str::random(10),
            'tensp'=>\Str::random(20),
            'chatlieu'=>\Str::random(20),
            'kichthuoc'=>rand(1,15),
            'categories_id'=>rand(1,5)

]);
        
    }
}
