function load(){
        $.get("http://localhost/banhang/public/api/supplier/",
          function(data){  
            if(data.status_code == 200)  { 
              let suppliers = data.data;
            $.each(suppliers, function(i, value) { 
           
              //hiển thị nội dung ra view
             let stt = i + 1;               
             let html = '<a  class="btnEdit" href="#" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModalUpdate" ><img class="icon_edit" src="icons/icon_edit.png" /></a>'                  
               html += '<a style="margin-left: 15px;"  class="btnDelete" href="#" ><img class="icon_delete" src="icons/icon_delete.png" /></a>'                 
                 
              $('#list_ncc').append($("<tr>")
                  .append($("<td>").addClass('idncc').append(suppliers[i].id))
                  .append($("<td>").append(stt))
                  .append($("<td>").append(suppliers[i].mancc))
                  .append($("<td>").append(suppliers[i].tenncc))
                  .append($("<td>").append(suppliers[i].diachincc))
                  .append($("<td>").append(suppliers[i].sdtncc))
                  .append($("<td>").append(suppliers[i].emailncc))
                  .append($("<td>").append(suppliers[i].ttthanhtoan))
                  .append($("<td>").append(suppliers[i].ghichu))
                  .append($("<td>").addClass('thaotac').append(html))
               ); 
             
             
          }); 
        }
        else { 
              let empty_table = '<tr><td colspan="9" class="table_emmpty">' + data.message + '</td></tr>'
              $('#list_ncc').append(empty_table);
            }
        });
};
//======================================================================//
function addSupplier() {    
    
    let txtmancc = $("input[name='mancc']").val();
    let txttenncc = $("input[name='tenncc']").val();
    let txtdiachincc = $("input[name='diachincc']").val();
    let txtsdtncc = $("input[name='sdtncc']").val();
    let txtemailncc = $("input[name='emailncc']").val();
    let txtttthanhtoan = $("input[name='ttthanhtoan']").val();
    let txtghichu = $("input[name='ghichu']").val();
    
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

      switch(data.message_code){
        case 111:
          alert(data.message);
          break;
          case 112:
          alert(data.message);
          break;
          case 500:
          alert(data.message);
          break;
          case 200:
            $('#myModal').modal('hide');                             
            notification(data.message);      
            document.getElementById("formAddNcc").reset();  //refresh form add supplier       
            RefreshTable(); 
      }   
    });      
}

$(document).ready ( function () { 
    $(document).on ("click", ".btnEdit", function () { //Show info Supplier 
         let idncc = $(this).parents("tr").find('.idncc').text();
         $.get("http://localhost/banhang/public/api/supplier/" + idncc,
        function(data){        
            $.each(data,function(i,item){
                
            $('#myModalUpdate').appendTo("body");
            $("input[name='Edit_idncc']").val(item.id);
            $("input[name='Edit_mancc']").val(item.mancc);
            $("input[name='Edit_tenncc']").val(item.tenncc);
            $("input[name='Edit_diachincc']").val(item.diachincc);
            $("input[name='Edit_sdtncc']").val(item.sdtncc);      
            $("input[name='Edit_emailncc']").val(item.emailncc);
            $("input[name='Edit_ttthanhtoan']").val(item.ttthanhtoan);
            $("input[name='Edit_ghichu']").val(item.ghichu);

            });    
        });
               
    });
 
});
function UpdateSupplier()
{  
    let txtidncc = $("input[name='Edit_idncc']").val();
    let txttenncc = $("input[name='Edit_tenncc']").val();
    let txtdiachincc = $("input[name='Edit_diachincc']").val();
    let txtsdtncc = $("input[name='Edit_sdtncc']").val();
    let txtemailncc = $("input[name='Edit_emailncc']").val();
    let txtttthanhtoan = $("input[name='Edit_ttthanhtoan']").val();
    let txtghichu = $("input[name='Edit_ghichu']").val();
    $("#myModalUpdate").modal("hide");
    $.post("http://localhost/banhang/public/api/supplier/" + txtidncc + "/edit",
      {
        "id": txtidncc,
        "tenncc": txttenncc,
        "diachincc": txtdiachincc,
        "sdtncc": txtsdtncc,
        "emailncc": txtemailncc,
        "ttthanhtoan": txtttthanhtoan,
        "ghichu": txtghichu
      },
      function(data,status){ 
        RefreshTable();       
        alert(data.message) ;      
      });

}
function RefreshTable() {
  $("#list_ncc").html('<script>load()</script>');
}
function notification(message)
{  
  $("#Modal_Notification").modal('show');
  $("#Modal_Notification").appendTo("body");
  $("#Notification_content").append(message); 
};
