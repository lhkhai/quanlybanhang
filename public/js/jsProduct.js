
function update(id) {    
  $('#myModalUpdate').appendTo("body");
  $.get("http://localhost/banhang/public/api/product/" + id + "/show",
      function(data){        
        $.each(data,function(i,item){        
        $("input[name='masp_edit']").val(item.masp);
        $("input[name='tensp_edit']").val(item.tensp);
        $("input[name='categories_id_edit']").val(item.categories_id);
        $("input[name='chatlieu_edit']").val(item.chatlieu); 
        $("input[name='kichthuoc_edit']").val(item.kichthuoc);
        $("input[name='giaban_edit']").val(item.giaban);
        $("input[name='soluong_edit']").val(item.soluong);
        $("#mota_edit").val(item.mota);  
        $("#spnoibat_edit").val(item.spnoibat);
        $("#spmoi_edit").val(item.spmoi);
        $("input[name='mota_edit']").val(item.mota);           
        }); 
        
    });  
    $('#formEdit').on('submit', function (e) {
      e.preventDefault();  
       $('#myModalUpdate').modal('hide');
       var formData = new FormData(document.getElementById('formEdit'));
        $.ajax({        
           url: 'http://localhost/banhang/public/api/product/' + id +'/update', 
           type: 'POST',
           data: formData,
           contentType: false,
           processData: false,
           success: function (response) {
            
               if(response.message_code==200)
               {
                 alert(response.message);
                 location.reload();
               }
               else {
                 alert(response.message);                 
               }
           } ,
           error: function (xhr, status, error) {
              alert('Lỗi: ' + error);
           } 
       }); 
     
    });
};

$(document).ready(function () {
  $('#formAdd').on('submit', function (e) {
     e.preventDefault(); /*ngăn chặn sự kiện chuyển tiếp link của form*/ 
      var formData = new FormData(this);
      //var formData = new FormData(document.getElementById('formAdd'))
      $('#myModal').modal('hide');
      $.ajax({
          url: 'http://localhost/banhang/public/api/product', 
          type: 'POST',
          data: formData,
          contentType: false,
          processData: false,
          success: function (response) {
             
              if(response.message_code==200)
              {
                alert(response.message);
                location.reload();
              }
              else {
                alert(response.message);
              }
          },
          error: function (xhr, status, error) {
              console.log('Lỗi: ' + error);
          }
      });
    
 });
});

function destroy(id){
 
  if(confirm("Bạn có chắc muốn xóa không?")==true)
  {
    $.get("http://localhost/banhang/public/api/product/" + id + "/delete",
    function(data){
    alert(data.message);
    location.reload();
    });
  }
}
