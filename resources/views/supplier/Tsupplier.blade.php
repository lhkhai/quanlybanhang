@extends('manage')
@section('content')
<script>
  
$(document).ready(function(){  
      var mancc = $(this).parents("tr").find(".mancc").text();
      $.get("http://localhost/banhang/public/api/supplier/",
         function(data,status){
          alert("data");        
        });  
  });
</script>
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
  <table class="table table-bordered">
      <thhead>
          <tr class='title_table_ncc'><th class='stt'>STT</th><th class='mancc'>Mã NCC</th><th class='tenncc'>Tên NCC</th><th class='diachincc'>Địa chỉ NCC</th><th class='sdtncc'>SĐT NCC</th><th class='ttthanhtoan'>TT Thanh toán</th><th class='ghichu'>Ghi chú</th><th class="thaotac">Thao tác</th></tr>
      </thhead>
      <thbody>
    <?php $stt=1; ?>
      @foreach ($db as $row) 
         
      <tr>
      <td class="idncc">{{$row->id}}</td>
      <td class='stt'><?php echo $stt++;?></td><td class='mancc'>{{$row->mancc}}</td>
      <td class='tenncc'>{{$row->tenncc}}</td><td class='diachincc'>{{$row->diachincc}}</td>
      <td class='sdtncc'>{{$row->sdtncc}}</td><td class='ttthanhtoan'>{{$row->ttthanhtoan}}</td>
      <td class='ghichu'>{{$row->ghichu}}</td>
      <td class="thaotac">      
        <a id="editsupplier" href="#"><!--href="{{asset('/editsupplier')}}/{{$row->id}} >data-toggle="modal" data-target="#myModalupdate" value="Update">-->
              <img class="icon_edit" src="{{asset('/icons/icon_edit.png')}}" />
              </a>
        <a href="{{asset('/deletesupplier')}}">
          <img class="icon_delete" src="{{asset('/icons/icon_delete.png')}}" />
        </a>
      </td>
      </tr>
      
      endforeach
      
      </thbody>
  </table>
</div>
<div class="phantrang">Phân trang</div>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">         
      
      <div class="modal-content">
       <div class="modal-header">
          <button style="color: white" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cập nhật thông tin nhà cung cấp</h4>
        </div>
        <div class="modal-body">
    <form id= "formAddNcc" class="form-horizontal" action="{{asset('/editsupplier')}}" enctype="multipart/form-data" method="POST"> 
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
            <button type="submit" class="btn btn-primary" value="Cập nhật" >cập nhật</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
        </div>
      </div>
  </form>
  </div> <!------------------------------------ Form thêm ---------------------------------------------------------->
  
  <!------------------------------------ Form cập nhật------------------------------------------------------>
  <div class="modal fade" id="myModalupdate" role="dialog">
    <div class="modal-dialog">         
      
      <div class="modal-content">
       <div class="modal-header">
          <button style="color: white" type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">THÊM NHÀ CUNG CẤP</h4>
        </div>
        <div class="modal-body">
    <form class="form-horizontal" action="{{asset('/editsupplier')}}" enctype="multipart/form-data" method="POST"> <!-----------Form thêm nhà cung cấp ---------------->
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
            <button type="submit" class="btn btn-primary" value="Thêm" >Thêm</button>
            <button type="button" class="btn btn-primary" data-dismiss="modal">Thoát</button>
        </div>
      </div>
  </form>
  </div> <!---------------------------Form cập nhật------------------------------------------------> 
   
    <script>
      /* Chuyển form myModal ra thẻ ngoài cùng tránh lỗi popup bị mờ*/
    $(document).ready(function(){
            $("#addncc").click(function(){
                $('#myModal').appendTo("body");
            });
            $("#editsupplier").click(function(){
              $('#myModalupdate').appendTo("body");
            });
        });
        </script>
    
       @if(session('Notification')) 
      <script type='text/javascript'>
        window.alert("Thêm thành công")
      </script>           
        @endif
    
@endsection
