<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DIỆN TÍCH và CHU VI HÌNH TRÒN</title>
</head>
<body>
<?php
define("pi",3.14);
if(isset($_POST['submit'])){
    $r = $_POST['bankinh'];
    if(isset($r) and is_numeric($r) and $r>0){
        $cv = 2 * $r * pi;
        $dt = $r * $r * pi;
    }
    else{
        $r = "Sai định dạng";
    }
    if(isset($_POST['reset'])){
        $r = '';
        $cv = '';
        $dt = '';
    }

}
?>
<form action="" name="hinhTron" method="post">
    <table align="center" style="background-color: antiquewhite">
        <tr>
            <td style="background-color: darkorange; color: darkred; text-align: center" colspan="2"><h4>DIỆN TÍCH và CHU VI HÌNH TRÒN</h4></td>
        </tr>
        <tr>
            <td>Bán kính:</td>
            <td><input type="text" name="bankinh" value="<?php if (isset($r)) echo $r; else echo ''?>"></td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td><input type="text" name="dientich" readonly value="<?php if (isset($dt)) echo $dt; else echo ''; ?>" style="background-color: lightpink"></td>
        </tr>
        <tr>
            <td>Chu vi:</td>
            <td><input type="text" name="chuvi" readonly value="<?php if (isset($cv)) echo $cv; else echo ''; ?>" style="background-color: lightpink"></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center">
                <input type="submit" name="submit" value="Tính">
                <input type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
