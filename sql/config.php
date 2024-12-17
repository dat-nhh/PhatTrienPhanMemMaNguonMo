<?php
$conn = mysqli_connect("localhost", "root", "", "CSDLSV");
if (!$conn) {
    die("Kết nối thất bại : " . mysqli_connect_error());
}
//else {
//    echo "Kết nối thành công<br>";
//}
?>