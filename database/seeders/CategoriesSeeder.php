<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<=100;$i++)
        {
            \DB::table('categories')->insert(['manhom'=> \Str::random(15),'tennhom'=> 'Nhóm sản phẩm '.$i,
            'diengiai'=> 'Diễn giải '.$i]);
        }
    }
}
