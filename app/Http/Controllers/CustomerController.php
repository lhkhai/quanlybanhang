<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customer = customer::paginate(10);
        return view('/customer.customer')->with(['dataview'=>$customer]);  
    }

    public function getData($rowperpage)
    {
        $customer = customer::paginate($rowperpage);
        return view('/customer.customer')->with(['dataview'=>$customer,'rowperpage'=>$rowperpage]);
    }
    
    
    public function search(Request $request)
    {
        if(empty($request->input('input_search_makh')) && empty($request->input('input_search_tenkh')) && empty($request->input('input_search_sdt')))
        
        {        
         return redirect('customer');
        }
        else {
         if($request->has('input_search_makh'))
         {
            
            $query = customer::where('makh','LIKE',"%".$request->input('input_search_makh')."%");
         }
        if($request->has("input_search_tenkh"))
        {
            $query->where(function ($q) use ($request){
            return $q->where('tenkh','LIKE','%'.$request->input('input_search_tenkh').'%');
            });
        }
         if ($request->has('input_search_sdt'))
        {
            $query->where(function ($q) use ($request)
            {
                return $q->where('sdt', 'LIKE','%'.$request->input_search_sdt . '%');
            });
        } 
        $dataview = $query->paginate(10);  
       return view('/customer.customer')->with(['dataview'=>$dataview]);
        }
    }  
    public function test()
    {
        return view('product.product')->with(['test'=>'phản hồi']);
    }  
}
