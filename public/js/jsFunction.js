
function NumberKey(e) //only input number
{
  const charCode = (e.which) ? e.which : keyCode;
  if(charCode > 47 && charCode < 58)
    return true;
  return false; 
}

function CheckNumberphone(id) //check number phone by id
 {
 	let txtid = $("#" + id).val();    
    var regExp = /^(0[235789][0-9]{8}$)/;
     if (!regExp.test(txtid)) 
          alert('Số điện thoại không hợp lệ!');    
 }

 

$(document).ready(function(){ //load khi trọn số dòng hiển thị trên trang
  $("#select_perpage").on('change',function(){
    let numrow =  $(this).val();   
    let url = location.href;
    let local = url + '&perpage=' + numrow; 
    location.href =local;
  });
});
function OpenModal()
{
    $('#myModal').appendTo("body");
}

  
$(document).ready(function(){ //hiển thị ảnh lớn trong trang product
    $('.imgProduct').hover (function (e) {
        const urlimg = $(this).attr('src');
        $('.large-image img').attr('src',urlimg);
        $(".large-image").appendTo('body');
        $('.large-image').toggle();
    });
});

