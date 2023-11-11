<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\categories;

class ProductController extends Controller
{
    //
    public function index($rowperpage=null)
    {
        if($rowperpage==null)
        {
            $rowperpage=10;
        }
        else {$rowperpage = $rowperpage; }  
        $categories = categories::all();     
        $product = \DB::table('products')->join('categories','categories.id','=','products.categories_id')
                    ->select('categories.tennhom as tennhom','products.*')->paginate($rowperpage);
        return view('product.product')->with(['dataview'=>$product,'categories'=>$categories,'rowperpage'=>$rowperpage]);

    }

    public function search(Request $request)
    {
        $query = product::all();
        if($request->has('input_search_masp'))
         {            
           // $query = customer::where('masp','LIKE',"%".$request->input('input_search_masp')."%");
            $query->where(function ($q) use ($request){
                return $q->where('masp','LIKE','%'.$request->input('input_search_masp').'%');
                });
         }
        if($request->has("input_search_tensp"))
        {
            $query->where(function ($q) use ($request){
            return $q->where('tensp','LIKE','%'.$request->input('input_search_tensp').'%');
            });
        }
         if ($request->has('input_search_nhomsp'))
        {
            $query->where(function ($q) use ($request)
            {
                return $q->where('categories_id', 'LIKE','%'.$request->input_search_nhomsp . '%');
            });
        } 
        $dataview = $query->paginate(10);  
        //return view('/product.product')->with(['dataview'=>$dataview,'thongbao'=>'test_response']); 
        return redirect('/customer');

    }
    public function test()
    {
        return view('customer.customer');
    }
    
    
}
