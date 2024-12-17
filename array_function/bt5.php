<?php
$text = "";
$newText = "";
$array = array();
$newArray = array();
$mangcu = "";
if (isset($_POST['submit'])) {
    $text = $_POST['dayso'];
    $giatriCu = $_POST['giatriCu'];
    $giatriMoi = $_POST['giatriMoi'];
    $array = explode(",", $text);
    $mangcu = xuat_mang($array);
    $newArray = thay_the_mang($array, $giatriCu, $giatriMoi);
    $newText = xuat_mang($newArray);
}

function xuat_mang($array) {
    return implode(" ", $array);
}

function thay_the_mang($array, $giatriCu, $giatriMoi) {
    foreach ($array as $index => $value) {
        if ($value == $giatriCu) {
            $array[$index] = $giatriMoi;
        }
    }
    return $array;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thay Thế Mảng</title>
</head>
<body>
<form method="POST" action="">
    <table align="center" style="background-color: white">
        <tr>
            <td colspan="3" align="center" style="color: white; background-color: darkmagenta"> <h4> THAY THẾ </h4> </td>
        </tr>
        <tr style="background-color: plum">
            <td>Nhập dãy số</td>
            <td><input type="text" name="dayso" size="50" value="<?php echo $text; ?>"></td>
        </tr>
        <tr style="background-color: plum">
            <td>Giá trị cũ</td>
            <td><input type="text" name="giatriCu"></td>
        </tr>
        <tr style="background-color: plum">
            <td>Giá trị mới</td>
            <td><input type="text" name="giatriMoi"></td>
        </tr>
        <tr style="background-color: plum">
            <td></td>
            <td>
                <input type="submit" name="submit" value="Thay thế" style="background-color: lightyellow">
            </td>
        </tr>
        <tr>
            <td>Mảng cũ</td>
            <td><input type="text" name="mangCu" size="50" value="<?php echo $mangcu; ?>" style="background-color: lightpink" readonly></td>
        </tr>
        <tr>
            <td>Mảng mới</td>
            <td><input type="text" name="mangMoi" size="50" value="<?php echo $newText; ?>" style="background-color: lightpink" readonly></td>
        </tr>
        <tr>
            <td colspan="3" align="center"> (<span style="color: red">Ghi chú</span> Các số được nhập cách nhau bằng dấu ",") </td>
        </tr>
    </table>
</form>

</body>
</html>