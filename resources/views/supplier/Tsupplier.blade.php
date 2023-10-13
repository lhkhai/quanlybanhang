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
  <table class="table table-bordered">
      <thhead>
          <tr class='title_table_ncc'><th class='stt'>STT</th><th class='mancc'>Mã NCC</th><th class='tenncc'>Tên NCC</th><th class='diachincc'>Địa chỉ NCC</th><th class='sdtncc'>SĐT NCC</th><th class='ttthanhtoan'>TT Thanh toán</th><th class='ghichu'>Ghi chú</th><th class="thaotac">Thao tác</th></tr>
      </thhead>
      <thbody>
    <?php $stt=1; ?>
      @foreach ($supplier as $row) 
         
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
      
      @endforeach
      
      </thbody>
  </table>
  
</div>
<div class="paginationWrap">{{$supplier->links()}}</div>
  
    
@endsection
