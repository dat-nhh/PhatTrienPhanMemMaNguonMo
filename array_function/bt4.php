<?php
$text = "";
$array = array();
$kq = "";

if (isset($_POST['submit'])) {
    $text = $_POST['dayso'];
    $mang = xuat_mang(array());
    $array = explode(",", $text);
    $giatri = $_POST['giatri'];
    $timkiem_result = tim_kiem($array, $giatri);
    $kq = $timkiem_result ? "Đã tìm thấy $giatri tại vị trí thứ " . array_search($giatri, $array) +1 . " của mảng" : "Không tìm thấy $giatri trong mảng";
}

function tim_kiem($array, $giatri) {
    foreach ($array as $index => $value) {
        if ($value == $giatri) {
            return 1;
        }
    }
    return 0;
}
function xuat_mang($array) {
    return implode(" ", $array);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nhập và Tìm kiếm trên dãy số</title>
</head>
<body>
<form method="POST" action="">
    <table align="center" style="background-color: lightseagreen">
        <tr>
            <td colspan="3" align="center" style="background-color: teal; color: white"> <h4>TÌM KIẾM</h4> </td>
        </tr>
        <tr>
            <td>Nhập mảng</td>
            <td>
                <input type="text" name="dayso" value="<?php echo $text; ?>">
            </td>
        </tr>
        <tr>
            <td>Nhập số cần tìm</td>
            <td><input type="text" name="giatri" size="5" value="<?php echo $giatri; ?>"></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Tìm kiếm" style="background-color: lightskyblue">
            </td>
        </tr>
          <tr>
            <td>Mảng</td>
            <td><input type="text" name="mang" value="<?php echo isset($array) ? xuat_mang($array) : ''; ?>" readonly></td>
            <td></td>
        </tr>
        <tr>
            <td class="bold-text">Kết quả tìm kiếm</td>
            <td><input type="text" name="ketqua" value="<?php echo $kq; ?>" readonly style="background-color: lightcyan"></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="center" class="bold-text"> (*) Các số được nhập cách nhau bằng dấu "," </td>
        </tr>
    </table>
</form>

</body>
</html>