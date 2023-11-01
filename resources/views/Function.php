<?php
function CallApi($url)
{
    $apiUrl = $url; 
// Tạo một phiên cURL mới
$ch = curl_init($apiUrl);
// Cài đặt các tùy chọn cURL để nhận dữ liệu JSON
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Lấy dữ liệu từ API thay vì hiển thị nó trực tiếp
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Tắt kiểm tra SSL cho môi trường phát triển, bạn nên sử dụng nó trong sản phẩm thực tế
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
// Thực hiện cuộc gọi API
$response = curl_exec($ch);
if ($response === false) {
   return 'Lỗi cURL: ' . curl_error($ch);
} else {
    // Giải mã dữ liệu JSON
    //$objData = json_decode($response, true);    
    return $response;
    /* if (json_last_error() === JSON_ERROR_NONE) {
       return $response;
    } else {
       return 'Lỗi giải mã JSON: ' . json_last_error_msg();
    } */
}
curl_close($ch);

}
?>