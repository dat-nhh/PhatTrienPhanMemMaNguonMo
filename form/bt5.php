<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TÍNH TIỀN KARAOKE</title>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $start = $_POST['start'];
    $end = $_POST['end'];
    if(isset($start) and isset($end)){
        $s_hour = intval(substr($start, 0,2));
        $s_min = intval(substr($start, 3,2));
        $e_hour = intval(substr($end, 0,2));
        $e_min = intval(substr($end, 3,2));
        if($s_hour <10 && $e_hour >0){
            $tien = "Chứa thời gian nghỉ";
        }
        else{
            if($e_hour < $s_hour || ($e_hour == $s_hour && $e_min > $s_min)){
                $tien = "Giờ kết thúc phải > Giờ bắt đầu";
            }
            else{
                $s_hour += $s_min/60;
                $e_hour += $e_min/60;
                if($e_hour >= 17){
                    if($s_hour >= 17){
                        $tien = ($e_hour - $s_hour) * 45000;
                    }
                    else{
                        $tien = ($e_hour - 17) * 45000 + (17 - $s_hour) * 20000 ;
                    }
                }
                else {
                    $tien = ($e_hour - $s_hour) * 20000 ;
                }
            }
        }
        $tien = round($tien);
    }
    else{
        $tien = "Sai định dạng";
    }
    if(isset($_POST['reset'])){
        $start = '';
        $end = '';
        $tien = '';
    }
}
?>
<form action="" name="tienKaraoke" method="post">
    <table align="center" style="background-color: cadetblue">
        <tr>
            <td style="background-color: teal; color: white; text-align: center" colspan="3"><h4>TÍNH TIỀN KARAOKE</h4></td>
        </tr>
        <tr>
            <td>Giờ bắt đầu:</td>
            <td><input type="time" name="start" value="<?php if (isset($start)) echo $start; else echo ''?>"></td>
            <td>(h)</td>
        </tr>
        <tr>
            <td>Giờ kết thúc:</td>
            <td><input type="time" name="end" value="<?php if (isset($end)) echo $end; else echo ''?>"></td>
            <td>(h)</td>
        </tr>
        <tr>
            <td>Tiền thanh toán:</td>
            <td colspan><input type="text" name="tien" size="9" readonly value="<?php if (isset($tien)) echo $tien; else echo ''; ?>" style="background-color: lightyellow"></td>
            <td>(VNĐ)</td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center">
                <input type="submit" name="submit" value="Tính tiền">
                <input type="submit" name="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
