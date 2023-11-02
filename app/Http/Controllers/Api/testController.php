<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    //
    public function store(Request $q)
    {
        \DB::table('categories')->insert([
            'manhom'=>$q->manhom,
            'tennhom'=>$q->tennhom,
            'diengiai'=>$q->diengiai
        ]);
        return response()->json(['message'=>'Thêm thành công'],200);
    }
}
