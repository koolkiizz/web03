<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "baitap";

//tạo kết nối đến mysql bằng mysqli_connect
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Kiểm tra kết nối có thành công hay không
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
// đặt bộ mã ký tự là Unicode để hỗ trợ tiếng việt
mysqli_set_charset($conn, 'utf8');