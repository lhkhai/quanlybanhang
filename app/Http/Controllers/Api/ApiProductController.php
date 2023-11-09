<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
class ApiProductController extends Controller
{
    //
    public function store(Request $request)
    {
        $data = $request->validate([
            'masp' => 'required|string',
            'tensp' => 'required|string',
            'hinhanh.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]); 
        $masp = $request->masp;
        $check_id = \DB::table('products')->where('masp','=',$masp)->get();       
        if($check_id->count()==0){
            $product = new product();
            $product->masp = $request->masp;
            $product->tensp = $request->tensp;
            $product->chatlieu = $request->chatlieu;
            $product->kichthuoc = $request->kichthuoc;
            $product->categories_id = $request->categories_id;
            $product->giaban = $request->giaban;
            $product->soluong = $request->soluong;
            $product->mota = $request->mota;
            $product->spnoibat = $request->spnoibat;
            $product->spmoi = $request->spmoi;
            if ($request->hasFile('hinhanh')) {
                $imgPaths=[];
                foreach($request->file('hinhanh') as $image)
                {
                    $publicpath = public_path('imgUpload/imgProduct');
                    $gethinhanh=time().$image->getClientOriginalName();
                    $image->move($publicpath,$gethinhanh);
                    $imagePaths[] = $gethinhanh;

                }
                $product->hinhanh = json_encode($imagePaths);
                
            }
            $product->save();
            return response()->json(['message_code'=>200,
                                    'message'=>"Đã thêm sản phẩm!"],200);
        }
        else {
            return response()->json(['message_code'=>201,
                                    'message'=>'Mã sản phẩm đã tồn tại'],200);
        }
    }
    public function update(Request $request, int $id)
    {
        $validator = Validator::make($request->all(),['hinhanh_edit.*' => 'image|mimes:jpeg,png,jpg,gif']);
        if($validator->fails())
        {
            return response()->json(['message_code'=> 422,'message'=>'Chỉ hỗ trợ file ảnh định dạng jpg, jpeg, png, gif!'],200);
        }
        else { 
            
            $product = product::find($id);
            $formData = $request->all(); 
            $product->tensp =  $formData['tensp_edit'];
            $product->chatlieu = $formData['chatlieu_edit'];
            $product->kichthuoc = $formData['kichthuoc_edit'];
            $product->categories_id = $formData['categories_id_edit'];
            $product->giaban = $formData['giaban_edit'];
            $product->soluong = $formData['soluong_edit'];
            $product->mota = $formData['mota_edit'];
            $product->spnoibat = $formData['spnoibat_edit'];
            $product->spmoi = $formData['spmoi_edit']; 
            if ($request->hasFile('hinhanh_edit')) {               
                $img_delete = json_decode($product->hinhanh);
                for($i=0;$i<count($img_delete);$i++)
                {   
                    $image_path_delete="imgUpload/imgProduct/".$img_delete[$i];
                    File::delete($image_path_delete);
                }
                $imgPaths=[];
                foreach($request->file('hinhanh_edit') as $image)
                {
                    $publicpath = public_path('imgUpload/imgProduct');
                    $gethinhanh=time().$image->getClientOriginalName();
                    $image->move($publicpath,$gethinhanh);
                    $imagePaths[] = $gethinhanh;
                }
               $product->hinhanh = json_encode($imagePaths);
            }
            $check = $product->update();       
            if($check)
            {
            return response()->json(['message_code'=>200,'message'=>"Cập nhật sản phẩm thành công"],200);
            }
            else 
            {
                return response()->json(['message'=>'Update lỗi']);
            } 
        }

    }
    public function destroy(int $id)
    {
        $product = product::find($id);
        $img = json_decode($product->hinhanh);
        
       for($i=0;$i<count($img);$i++)
        {   
            $image_path="imgUpload/imgProduct/".$img[$i];
            File::delete($image_path);
        }
        $product->delete();
        return response()->json(['message'=>'Đã xóa sản phẩm'],200);
                       
    }
    public function show(int $id)
    {
        $product = product::find($id);
        return response()->json(['product'=>$product]);
    }
}
