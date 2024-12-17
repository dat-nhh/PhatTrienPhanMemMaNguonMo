<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register form</title>
</head>
<body>
<?php
if(isset($_POST['dai']) && isset($_POST['rong'])){
    $dai = $_POST["dai"];
    $rong = $_POST["rong"];
    if(isset($_POST['resetSubmit'])){
        $dai = '';
        $rong = '';
        $S = '';
    }
    else{
        if(is_numeric($dai) && is_numeric($rong)){
            $S = $dai * $rong;
        }
        else
            $S = "Sai định dạng";
    }
}
?>
<form action="" name="regForm" method="post">
    <table style="background-color: antiquewhite">
        <tr>
            <td style="background-color: darkorange; color: darkred; text-align: center" colspan="2"><h4>DIỆN TÍCH HÌNH CHỮ NHẬT</h4></td>
        </tr>
        <tr>
            <td>Chiều dài:</td>
            <td><input type="text" name="dai" value="<?php echo $dai ?>" size="30"></td>
        </tr>
        <tr>
            <td>Chiều rộng:</td>
            <td><input type="text" name="rong" value="<?php echo $rong ?>" size="30"></td>
        </tr>
        <tr>
            <td>Diện tích:</td>
            <td><input type="text" readonly value="<?php echo $S ?>" size="30"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Tính"></td>
            <td><input type="submit" name="resetSubmit" value="Reset"></td>
        </tr>
    </table>
</form>
</body>
</html>
