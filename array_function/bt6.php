<?php
function swap(&$a,&$b){
    $temp=$a;
    $a=$b;
    $b=$temp;
}

function sxTang ($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] > $arr[$j]) swap($arr[$i],$arr[$j]);
    return $arr;
}
function sxGiam ($arr)
{
    for($i=0;$i<count($arr)-1;$i++)
        for($j=$i+1;$j<count($arr);$j++)
            if($arr[$i] < $arr[$j]) swap($arr[$i],$arr[$j]);
    return $arr;
}
$text = null;
if(isset($_POST["submit"])){
    $text = $_POST["dayso"];
    $array = explode(",", $text);
    $result_decre = implode(" ",sxGiam($array));
    $result_incre = implode(" ",sxTang($array));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sắp xếp mảng</title>
</head>
<body>
<form method="POST" action="">
    <table align="center" style="background-color: lightseagreen">
        <tr>
            <td colspan="3" style="background-color: teal; color: white; text-align: center" > <h4>SẮP XẾP MẢNG</h4> </td>
        </tr>
        <tr>
            <td>Nhập dãy số</td>
            <td><input type="text" name="dayso" size="35" value="<?php echo $text; ?>"></td>
            <td style="color: #ff0a07">(*)</td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="submit" value="Sắp xếp tăng/giảm">
            </td>
        </tr>
        <tr style="background-color: lightcyan">
            <td style="color: red" colspan="3"> <b>Sau khi sắp xếp</b></td>
        </tr>
        <tr style="background-color: lightcyan">
            <td>Tăng dần</td>
            <td colspan="2">
                <input type="text" value="<?php if (isset($result_incre)) echo  $result_incre;?>" style="background-color: lightskyblue" size="35">
            </td>
        </tr>
        <tr style="background-color: lightcyan">
            <td>Giảm dần</td>
            <td colspan="2">
                <input type="text" value="<?php if (isset($result_decre)) echo  $result_decre;?>" style="background-color: lightskyblue" size="35">
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center" > (*) Các số được nhập cách nhau bằng dấu "," </td>
        </tr>
    </table>
</form>

</body>
</html>