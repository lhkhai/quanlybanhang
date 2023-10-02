@extends('manage')
@section('content')
<script>  
$(document).ready(function(){   
  function load(){  
   
      $.get("http://localhost/banhang/public/api/supplier/",
        function(data){       
           $.each(data, function(i, item) {
          $.each(item,function(key, value){
            //hiển thị nội dung ra view
           let stt = key + 1;                      
           let html = '<a id="btnEdit" href="#" > \
                  <img class="icon_edit" src="{{asset('/icons/icon_edit.png')}}" /></a>\
                <a id="btnDelete" href="{{asset('/deletesupplier')}}">\
                  <img class="icon_delete" src="{{asset('/icons/icon_delete.png')}}" />\
                </a>'
            $('#list_ncc').append($("<tr>")
                .append($("<td>").addClass('idncc').append(item[key].id))
                .append($("<td>").append(stt))
  		          .append($("<td>").append(item[key].mancc))
                .append($("<td>").append(item[key].tenncc))
                .append($("<td>").append(item[key].diachincc))
                .append($("<td>").append(item[key].sdtncc))
                .append($("<td>").append(item[key].emailncc))
                .append($("<td>").append(item[key].ttthanhtoan))
                .append($("<td>").append(item[key].ghichu))
                .append($("<td>").addClass('thaotac').html(html))
             );
           
          });       
        }); 
      });
  }
  load();  //load data
  
  //Add supplier
    $("#btnAddNcc").click(function(){     
        let txtmancc = $("input[name='mancc']").val();
        let txttenncc = $("input[name='tenncc']").val();
        let txtdiachincc = $("input[name='diachincc']").val();
        let txtsdtncc = $("input[name='sdtncc']").val();
        let txtemailncc = $("input[name='emailncc']").val();
        let txtttthanhtoan = $("input[name='ttthanhtoan']").val();
        let txtghichu = $("input[name='ghichu']").val();
        $('#myModal').modal('hide');
        $.post("http://localhost/banhang/public/api/supplier",
        {
          "mancc": txtmancc,
          "tenncc": txttenncc,
          "diachincc": txtdiachincc,
          "sdtncc": txtsdtncc,
          "emailncc": txtemailncc,
          "ttthanhtoan": txtttthanhtoan,
          "ghichu": txtghichu
        },
        function(data,status){ 
          document.getElementById("formAddNcc").reset();  //làm mới form nhập
          window.location.reload(true); //load lại danh sách
          alert(data.message); 
        });        
          
    });     
    
    $(this).on("click", function(event){
      $(this).css("background","blue");
      alert(this);
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
      <thead>
          <tr class='title_table_ncc'><th class='stt'>STT</th><th class='mancc'>Mã NCC</th><th class='tenncc'>Tên NCC</th><th class='diachincc'>Địa chỉ NCC</th><th class='sdtncc'>Số điện thoại</th><th class='ttthanhtoan'>Email</th><th class='ttthanhtoan'>TT Thanh toán</th><th class='ghichu'>Ghi chú</th><th class="thaotac">Thao tác</th></tr>
      </thead>
    <tbody id = 'list_ncc'>    
            <!--  Hiển thị nội dung table -->
            <tr>
            <td class="idncc">test</td>
            <td class='stt'>Test</td><td class='mancc'>Test</td>
            <td class='tenncc'>Test</td>
            <td class='diachincc'>Test</td>
            <td class='sdtncc'>Test</td><td class='email'>mail</td><td class='ttthanhtoan'>Test</td>
            <td class='ghichu'>Test</td>
            <td class="thaotac">      
              <a class="btnEdit" href="#">
                    <!-- <img class="icon_edit" src="{{asset('/icons/icon_edit.png')}}" /> -->Edit
                    </a>
              <a href="{{asset('/deletesupplier')}}">
                <img class="icon_delete" src="{{asset('/icons/icon_delete.png')}}" />
              </a>
            </td>
            </tr>
    </tbody>
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
            <input id='btnAddNcc' type="button" class="btn btn-primary" value="Thêm" />
            <input id='btnDismiss' type="button" class="btn btn-primary" data-dismiss="modal" value="Thoát" />
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
