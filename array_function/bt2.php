<?php
$text="";
$kq=null;
$arr=array();
if (isset($_POST['submit'])){
    $text=$_POST['dayso'];
    $arr=explode(",",$text);
    foreach ($arr as $value) $kq=$kq+$value;
}
if (isset($_POST['reset'])){
    $text=$kq="";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nhập và tính trên dãy số</title>
</head>
<body>
<form method="post" action="">
    <table align="center" style="background-color: lightseagreen">
        <tr>
            <td style="background-color: teal; color: white; text-align: center" colspan="3"> <h4>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h4> </td>
        </tr>
        <tr>
            <td>Nhap day so</td>
            <td><input type="text" name="dayso" value="<?php echo  $text;?>"></td>
            <td style="color: red">(*)</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Tổng dãy số" style="background-color: lightyellow">
                <input type="submit" name="reset" value="Reset" style="background-color: lightyellow">
            </td>
        </tr>
        <tr>
            <td>Tổng dãy số</td>
            <td><input type="text" name="ketqua" value="<?php echo $kq;?>" readonly></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3" align="center"> (*) Các số được nhập cách nhau bằng dấu "," </td>
        </tr>
    </table>
</form>
</body>
</html>
