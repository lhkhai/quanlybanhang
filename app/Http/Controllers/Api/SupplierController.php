<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\supplier;
use Illuminate\Support\Facades\Validator;
class SupplierController extends Controller
{
    
    public function index()
    {
       $suppliers = supplier::all();
       if($suppliers->count()>0){       
       return response()->json(['data'=>$suppliers],200);  
       } else {
        return response()->JSON(['status'=> 404,
                                'message'=>'Không có mẫu tin nào'],
                                404);
       }
    }
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $validator = Validator::make($request->all(),[
             'mancc' => 'required|string|max:50',
            'tenncc' => 'required|string|max:200',
            'diachincc' => 'required|string|max:200',
            'sdtncc' => 'required|string|max:11',
            'emailncc' => 'required|string|max:50',  
        ]);
        if($validator->fails())
        {
            return response()->JSON([
                'status'=> 422,
                'message' => $validator->messages()
            ]);
        } else {
            $supplier = supplier::create([
                'mancc' => $request->mancc,
                'tenncc' => $request->tenncc,
                'diachincc' => $request->diachincc,
                'sdtncc' => $request->sdtncc,
                'emailncc' => $request->emailncc,
                'ttthanhtoan' => $request->ttthanhtoan,
                'ghichu' => $request->ghichu]);                
            if($supplier)
            {
                return response()->JSON([
                    'status' => 200,
                    'message' => 'Thêm dữ liệu thành công!'
                ],200);
            } else {
                return response()->JSON([
                    'status' => 500,
                    'message' => 'Đã có lỗi xãy ra. Liên hệ Admin để được hỗ trợ.'
                ],500);
            }

        }
    }
    public function show($id)
    {
        $supplier = supplier::find($id);
        if($supplier)
        {
            return response()->JSON([
                'status'=> 200,
                'data'=>$supplier],200);
        }
        else {
            return response()->JSON([
                'status'=>404,
                'message'=> 'Không tìm thấy dữ liệu'
            ], 404);
        }
    }
    public function edit($id)
    {
        $supplier = supplier::find($id);
        if($supplier)
        {
            return response()->JSON([
                'status'=> 200,
                'supplier'=>$supplier
            ],200);
        } else {
            return response()->JSON([
                'status'=> 404,
                'message'=> 'Không tìm thấy dữ liệu.'
            ],404);
        }
    }
    public function update(Request $request,int $id)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $supplier = supplier::find($id);
        if($supplier)
        {
            $supplier->update([
                'tenncc' => $request->tenncc,
                'diachincc' => $request->diachincc,
                'sdtncc' => $request->sdtncc,
                'emailncc' => $request->emailncc,
                'ttthanhtoan' => $request->ttthanhtoan,
                'ghichu' => $request->ghichu
            ]);
          return response()->JSON([
                    'status'=>200,
                    'message'=> "Cập nhật thành công!"
                ],200);
        } else {
                return response()->JSON([
                    'status'=>404,
                    'message'=>'Có lỗi xãy ra. Vui lòng liên hệ Admin để được hỗ trợ'
                ],404);
            }
        
    }
    public function destroy($id)
    {
        $supplier = supplier::find($id);
        if($supplier)
        {
            $supplier->delete();
            return response()->JSON([
                'status'=>200,
                'message'=>'Đã xóa thành công!'
            ],200);
        }
        else {
            return response()->JSON([
                'status'=>404,
                'message'=>'Mẫu tin cần xóa không tồn tại.'
            ],404);
        }
    }
}
