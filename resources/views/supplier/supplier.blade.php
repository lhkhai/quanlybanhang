@extends('manage')
@section('content')
<script>
  $(document).ready(function(){
  $("#sdtncc").blur(function(){
    var regExp = /^(0[235789][0-9]{8}$)/;
    var phone = document.getElementById("sdtncc").value;
    if (!regExp.test(phone)) 
        alert('Số điện thoại không hợp lệ!');
});
});
  </script>
<div id="title_ncc">DANH SÁCH NHÀ CUNG CẤP 
<input id="addncc" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" value="+ Thêm" />
</div>
<div class='list_ncc'>
  <table class="table table-bordered" id="view_table_supplier">
      <thead>
          <tr class='title_table_ncc'><th class='stt'>STT</th><th class='mancc'>Mã NCC</th><th class='tenncc'>Tên NCC</th><th class='diachincc'>Địa chỉ NCC</th><th class='sdtncc'>Số điện thoại</th><th class='ttthanhtoan'>Email</th><th class='ttthanhtoan'>TT Thanh toán</th><th class='ghichu'>Ghi chú</th><th class="thaotac">Thao tác</th></tr>
      </thead>
    <tbody id = 'list_ncc'>    
            <!--  Hiển thị nội dung table -->  
            <script>load();</script>
            
    </tbody>
  </table>
</div>
<div class="phantrang">Phân trang</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">         
      
      <div class="modal-content">
       <div class="modal-header">
          <button style="color: white" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">THÊM NHÀ CUNG CẤP</h4>
        </div>
        <div class="modal-body">
    <form id= "formAddNcc" class="form-horizontal" action="#" enctype="multipart/form-data" method="POST"> 
    @csrf
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Mã NCC:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text"  name="mancc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Tên NCC:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="tenncc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Địa chỉ:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="diachincc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Số điện thoại:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="sdtncc" maxlenght="10" name="sdtncc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="text" name="emailncc" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">TT Thanh Toán</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="ttthanhtoan" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Ghi chú:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="ghichu" />
      </div>
    </div>
    </div>
        <div class="modal-footer">
            <input id='btnAddNcc' onclick="addSupplier()" type="button" class="btn btn-primary" value="Thêm" />
            <input id='btnDismiss' type="button" class="btn btn-primary" data-dismiss="modal" value="Thoát" />
        </div>
      </div>
  </form>
  </div> <!------------------------------------ Form thêm ---------------------------------------------------------->
  
  <!------------------------------------ Form cập nhật------------------------------------------------------>
  <div class="modal fade" id="myModalUpdate" role="dialog">
    <div class="modal-dialog">         
      
      <div class="modal-content">
       <div class="modal-header">
          <button style="color: white" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cập nhật Nhà cung cấp</h4>
        </div>
        <div class="modal-body">
    <form id= "formEditNcc" class="form-horizontal" action="#" enctype="multipart/form-data" method="post"> 
    @csrf
    <div class="form-group">
      <input hidden="true" name="Edit_idncc" />
      <label class="control-label col-sm-3" for="text">Mã NCC:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" readonly  name="Edit_mancc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Tên NCC:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="Edit_tenncc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Địa chỉ:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="Edit_diachincc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Số điện thoại:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="sdtncc" maxlenght="10" name="Edit_sdtncc" required />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="email">Email:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="text" name="Edit_emailncc" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">TT Thanh Toán</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="Edit_ttthanhtoan" />
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="text">Ghi chú:</label>
      <div class="col-sm-9">
        <input type="text" class="form-control" id="text" name="Edit_ghichu" />
      </div>
    </div>
    </div>
        <div class="modal-footer">
            <input id='btnEditNcc' type="button" onclick="UpdateSupplier()" class="btn btn-primary" value="Cập nhật" />
            <input id='btnDismiss' type="button" class="btn btn-primary" data-dismiss="modal" value="Thoát" />
        </div>
      </div>
  </form>
  </div>  <!---------------------------Kết thúc Form cập nhật------------------------------------------------> 

<script>      
$(document).ready(function(){
            $("#addncc").click(function(){
                $('#myModal').appendTo("body");/* Chuyển form myModal ra thẻ ngoài cùng tránh lỗi popup bị mờ*/
            });   
});
</script>  
@include('Notification');  
@endsection
