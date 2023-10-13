<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\supplier;
use Carbon\carbon;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = supplier::paginate(10);
    
        return view('supplier.supplier')->with(['pag_supplier'=>$supplier]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = \Validator::make($input, ['mancc'=>$request,
                        'tenncc'=> 'required',
                        'diachincc'=> 'required',
                        'sdtncc'=> 'required',
                        'ttthanhtoan'=> 'required',
                        'ghichu'=> 'required',
                        'created_at'=>date('Y-m-d H:i:s')]);
        if($validator->fails()){
                            $arr = [
                              'success' => false,
                              'message' => 'Lỗi kiểm tra dữ liệu',
                              'data' => $validator->errors()
                            ];
                            return response()->json($arr, 200);
                        }
        $supplier = \App\Models\supplier::create($input);
        $arr = ['status' => true,
                'message'=>"Thêm thành công",
                'data'=> new \App\Http\Resources\supplier($supplier)
         ];
        return response()->json($arr, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function seeder()
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
