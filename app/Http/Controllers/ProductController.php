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
        $product = \DB::table('products')->join('categories','categories.id','=','products.categories_id')
                    ->select('categories.tennhom as tennhom','products.*')->paginate($rowperpage);
        return view('product.product')->with(['dataview'=>$product,'rowperpage'=>$rowperpage]);

    }
    
    
}
