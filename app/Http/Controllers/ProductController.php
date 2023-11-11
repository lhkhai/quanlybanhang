<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\categories;
use Illuminate\Http\RedirectResponse;

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
        $masp = $request->input_search_masp;
        $tensp = $request->input_search_tensp;
        $nhomsp = $request->input_search_nhomsp;
       // $chatlieu = $request->input_search_chatlieu;
        $chatlieu = $request->input('input_search_chatlieu');

        if(empty($masp) && empty($tensp) && empty($nhomsp) & empty($chatlieu))
        {
             return redirect('product');
        }
        else{
        if($request->has('input_search_masp'))
         {  
            $query = \DB::table('products')->join('categories','categories.id','=','products.categories_id')
                    ->select('categories.tennhom as tennhom','products.*');
          
           $query->where('masp','LIKE',"%".$request->input('input_search_masp')."%");
            
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
                return $q->where('tennhom', 'LIKE','%'.$request->input_search_nhomsp . '%');
            });
        } 
        if($request->has('input_search_chatlieu'))
        {
            $query->where(function ($q) use ($request){
               return $q->where('chatlieu','LIKE','%'.$request->input('input_search_chatlieu').'%');
            });
        }
        $dataview = $query->paginate(10); 
        return view('/product.product')->with(['dataview'=>$dataview]); 
        }

    }
    
    
}
