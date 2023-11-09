<?php

namespace Database\Seeders;
use Carbon\carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=100;$i++)
        {
            \DB::table("products")->insert(['masp'=>\Str::random(10),
                                        'tensp'=>\Str::random(20),
                                        'chatlieu'=>\Str::random(20),
                                        'kichthuoc'=>rand(1,15),
                                        'categories_id'=>rand(1,5)
                
            ]);
        }
    }
}
