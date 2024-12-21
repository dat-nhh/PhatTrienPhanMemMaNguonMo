<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KẾT QUẢ THI ĐẠI HỌC</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $toan = $_POST['toan'];
    $ly  = $_POST['ly'];
    $hoa = $_POST['hoa'];
    $chuan  = $_POST['chuan'];
    if(isset($toan) && isset($ly) && isset($hoa) && isset($chuan)
    && isset($toan) && isset($ly) && isset($hoa) && isset($chuan)
    && $toan>=0 && $ly>=0 && $hoa>=0 && $chuan>=0){
        $tong = $toan + $ly + $hoa;
        if($toan == 0 || $ly == 0 || $hoa == 0 || $chuan > $tong){
            $kq = "Rớt";
        }
        else
            $kq = "Đậu";
    }
    else{
        $kq = "Sai định dạng";
    }
    if(isset($_POST['reset'])){
        $toan = "";
        $ly = "";
        $hoa = "";
        $chuan = "";
        $tong = "";
        $kq = "";
    }

}
?>
<form action="" name="thiDH" method="post">
    <table align="center" style="background-color: lightpink">
        <tr>
            <td style="background-color: mediumvioletred; color: white; text-align: center" colspan="2"><h5>KẾT QUẢ THI ĐẠI HỌC</h5></td>
        </tr>
        <tr>
            <td>Toán:</td>
            <td><input type="text" name="toan" value="<?php if (isset($toan)) echo $toan; else echo '';?>"></td>
        </tr>
        <tr>
            <td>Lý:</td>
            <td><input type="text" name="ly" value="<?php if (isset($ly)) echo $ly; else echo ''; ?>"></td>
        </tr>
        <tr>
            <td>Hóa:</td>
            <td><input type="text" name="hoa" value="<?php if (isset($hoa)) echo $hoa; else echo '';?>"></td>
        </tr>
        <tr>
            <td>Điểm chuẩn:</td>
            <td><input type="text" name="chuan" value="<?php if (isset($chuan)) echo $chuan; else echo '';?>" style="color: red"></td>
        </tr>
        <tr>
            <td>Tổng điểm:</td>
            <td><input type="text" name="tong" readonly value="<?php if (isset($tong)) echo $tong; else echo '';?>" style="background-color: beige"></td>
        </tr>
        <tr>
            <td>Kết quả thi:</td>
            <td><input type="text" name="ketqua" readonly value="<?php if (isset($kq)) echo $kq; else echo '';?>" style="background-color: beige"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" name="submit" value="Xem kết quả">
                <input type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
