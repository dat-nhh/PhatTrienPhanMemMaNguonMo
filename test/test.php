<?php
$conn = mysqli_connect("localhost", "root", "", "csdl_sinhvien");
if (!$conn) {
    die("Thất bại tạo kết nối: " . mysqli_connect_error());
} else {
    echo "Kết nối thành công<br>";
}

$query = "SELECT * FROM `lop`;";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('<br><p>Có lỗi trong quá trình truy vấn dữ liệu.</p>');
}

$num_fields = mysqli_num_fields($result);
if ($num_fields != 0) {
    while ($row = mysqli_fetch_row($result)) {
        for ($i = 0; $i < $num_fields; $i++) {
            echo $row[$i] . " ";
        }
        echo "<br>";
    }
}
?>