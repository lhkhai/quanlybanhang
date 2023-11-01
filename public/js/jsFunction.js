
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
