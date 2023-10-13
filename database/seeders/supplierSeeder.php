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
        $mail = '@gmail.com';
        for($i=0;$i<=1000;$i++)
        {
            \DB::table('suppliers')->insert(['mancc'=> \Str::random(20),'tenncc'=> \Str::random(50),
            'diachincc'=> \Str::random(50),'sdtncc'=> \Str::random(11),'emailncc'=>\Str::random(20).$mail,
            'ttthanhtoan'=> \Str::random(50),'ghichu'=>\Str::random(10),'created_at'=> Carbon::now()]);
        }
    }
}
