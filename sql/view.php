<?php
require "config.php";
$query = "SELECT * FROM `thongtinsv` WHERE MaLop = 1;";
$result = mysqli_query($conn, $query);
if (!$result) {
    die('<br><p>Có lỗi trong quá trình truy vấn dữ liệu.</p>');
}

$ten = $ho = $dc = $lop = array();

$num_fields = mysqli_num_fields($result);
$index = 0;
if ($num_fields != 0) {
    while ($row = mysqli_fetch_row($result)) {
        $ho[$index] = $row[1];
        $ten[$index] = $row[2];
        $dc[$index] = $row[3];
        $lop[$index] = $row[4];
        $index++;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Xem thông tin sinh viên</title>
</head>
<body>
<a href="index.php">Trở về</a>
<table align="center" border="1">
    <tr>
        <td align="center" colspan="5" style="background-color: orangered"><h4>THÔNG TIN SINH VIÊN</h4></td>
    </tr>
    <tr style="background-color: bisque">
        <td>STT</td>
        <td>Tên</td>
        <td>Họ</td>
        <td>Địa chỉ</td>
        <td>ID Lớp</td>
    </tr>
    <?php
    for($i =0; $i < $index; $i++){
        if($i%2!=0)
            echo "<tr style='background-color: beige'>";
        else
            echo "<tr>";
        $stt = $i + 1;
        echo "<td>".$stt."</td>";
        echo "<td>".$ten[$i]."</td>";
        echo "<td>".$ho[$i]."</td>";
        echo "<td>".$dc[$i]."</td>";
        echo "<td>".$lop[$i]."</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
