<?php
$n=$kq='';
$array = [];
function taomang($n)
{
    $a=[];
    for($i=0;$i<$n;$i++){
        $a[$i]=rand($n*-100,$n*100);
    }
    return $a;
}

function xuatmang($a)
{
    return implode(", ",$a);
}

function ktra_ngto($num)
{
    if($num<0)
        $num*=-1;
    for($i=2;$i<$num;$i++){
        if($num%$i==0)
            return false;
    }
    return true;
}

if(isset($_POST['submit'])){
    $n = $_POST['number'];
    if($n%2!=0 || $n<=1 || $n>=20){
        $kq = "Nhập lại n!!";
    }
    else{
        $array = taomang($n);
        $ngto = [];
        $index = 0;
        $tong = 0;
        for($i=0;$i<$n;$i++){
            if(ktra_ngto($array[$i])){
                $ngto[$index] = $array[$i];
                $tong += $array[$i];
                $index++;
            }
        }
        if($tong!=0){
            $kq = "Các số nguyên tố trong mảng: " . xuatmang($ngto);
        }
        else
            $kq = "Không tồn tại số nguyên tố!";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Câu 1</title>
</head>
<body>
<form method="post" action="">
    <table align="center" style="background-color: bisque">
        <tr>
            <td colspan="2" align="center" style="background-color: red; color: yellow"><h4>Phát sinh mảng và tính toán</h4></td>
        </tr>
        <tr>
            <td>Nhập n (Số nguyên chẵn, 1 < n < 20):</td>
            <td><input type="number" name="number" value="<?php echo $n;?>"></td>
        </tr>
        <tr>
            <td>Mảng phát sinh:</td>
            <td><input type="text" name="array" readonly style="background-color: lightpink" value="<?php echo xuatmang($array) ?>" size="52"></td>
        </tr>
        <tr>
            <td>Kết quả:</td>
            <td><textarea rows="2" cols="50" readonly style="background-color: lightpink"><?php echo $kq;?></textarea></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Phát sinh và tính toán">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
