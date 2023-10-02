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
        //
        for($i=0;$i<=10;$i++)
        {
            \DB::table('suppliers')->insert(['mancc'=> \Str::random(20),'tenncc'=> \Str::random(50),
            'diachincc'=> \Str::random(50),'sdtncc'=> \Str::random(11),
            'ttthanhtoan'=> \Str::random(50),'ghichu'=>\Str::random(10),'created_at'=> Carbon::now()]);
        }
    }
}
