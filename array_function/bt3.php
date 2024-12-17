<?php
if (isset($_POST["submit"])) {
    $n = $_POST["numElements"];
    $array = tao_mang($n);
    $mang_kq = xuat_mang($array);
    $tong = tinh_tong($array);
    $min = tim_min($array);
    $max = tim_max($array);
}

function tao_mang($n) {
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[] = rand(0, 20);
    }
    return $array;
}

function xuat_mang($array) {
    return implode(" ", $array);
}

function tinh_tong($array) {
    return array_sum($array);
}

function tim_min($array) {
    return min($array);
}

function tim_max($array) {
    return max($array);
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Phát sinh mảng và tính toán</title>
</head>
<body>
<form action="" method="POST">
    <table align="center" >
        <tr>
            <td colspan="3" align="center" style="color: white; background-color: darkmagenta" > <h4>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h4> </td>
        </tr>
        <tr style="background-color: plum">
            <td>Nhập số phần tử</td>
            <td colspan="2"><input type="text" name="numElements" value="<?php echo isset($_POST['numElements']) ? $_POST['numElements'] : ''; ?>"></td>
        </tr>
        <tr style="background-color: plum">
            <td></td>
            <td colspan="2">
                <input type="submit" name="submit" value="Phát sinh và tính toán" style="background-color: lightyellow">
            </td>
        </tr>
          <tr>
            <td>Mảng</td>
            <td>
                <textarea style="background-color: lightpink" readonly rows="1"><?php echo isset($array) ? xuat_mang($array) : ''; ?></textarea>
            </td>
            <td></td>
        </tr>
        <tr>
            <td>GTLN</td>
            <td><input type="text" name="gtln" value="<?php echo isset($max) ? $max : ''; ?>" style="background-color: lightpink" readonly></td>
            <td></td>
        </tr>
        <tr>
            <td>GTNN</td>
            <td><input type="text" name="gtnn" value="<?php echo isset($min) ? $min : ''; ?>" style="background-color: lightpink" readonly></td>
            <td></td>
        </tr>
        <tr>
            <td>Tổng Mảng</td>
            <td><input type="text" name="tong" value="<?php echo isset($tong) ? $tong : ''; ?>" style="background-color: lightpink" readonly></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="center"> (<span style="color: red">Ghi chú</span>:Các phần tử trong mảng sẽ có giá trị từ 0 tới 20)</td>
        </tr>
    </table>
</form>
</body>
