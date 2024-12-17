<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>THANH TOÁN TIỀN ĐIỆN</title>
</head>
<body>
<?php
if (isset($_POST['submit'])) {
    $ten = $_POST['chuho'];
    $cscu = $_POST['cscu'];
    $csmoi = $_POST['csmoi'];
    $gia = $_POST['gia'];
    if (isset($gia) == false) {
        $gia = 20000;
    } else {
        $thanhtoan = "Sai định dạng";
    }
    if (isset($ten) && isset($cscu) && isset($csmoi) && is_numeric($cscu) && is_numeric($csmoi) && is_numeric($gia)
        && $cscu > 0 && $csmoi > 0 && $gia > 0) {
        $thanhtoan = ($csmoi - $cscu) * $gia;
    } else {
        $thanhtoan = "Sai định dạng";
    }
    if (isset($_POST['reset'])) {
        $ten = "";
        $cscu = "";
        $csmoi = "";
        $gia = "";
        $thanhtoan = "";
    }

}
?>
<form action="" name="tienDien" method="post">
    <table align="center" style="background-color: antiquewhite">
        <tr>
            <td style="background-color: darkorange; color: darkred; text-align: center" colspan="3"><h4>THANH TOÁN TIỀN ĐIỆN</h4></td>
        </tr>
        <tr>
            <td>Tên chủ hộ:</td>
            <td><input type="text" name="chuho" value="<?php if (isset($ten)) echo $ten; else echo '' ?>"></td>
            <td></td>
        </tr>
        <tr>
            <td>Chỉ số cũ:</td>
            <td><input type="text" name="cscu" value="<?php if (isset($cscu)) echo $cscu; else echo '' ?>"></td>
            <td>(Kw)</td>
        </tr>
        <tr>
            <td>Chỉ số mới:</td>
            <td><input type="text" name="csmoi" value="<?php if (isset($csmoi)) echo $csmoi; else echo '' ?>"></td>
            <td>(Kw)</td>
        </tr>
        <tr>
            <td>Đơn giá:</td>
            <td><input type="text" name="gia" value="<?php if (isset($gia)) echo $gia; else echo '' ?>"></td>
            <td>(VNĐ)</td>
        </tr>
        <tr>
            <td>Số tiền thanh toán:</td>
            <td><input type="text" name="thanhtoan" readonly
                       value="<?php if (isset($thanhtoan)) echo $thanhtoan; else echo '' ?>"
                       style="background-color: lightpink"></td>
            <td>(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>