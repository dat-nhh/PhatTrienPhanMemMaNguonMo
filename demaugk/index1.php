<?php
$n=$kq="";
$a=[];
function taomang($n)
{
    $a=[];
    for($i=0;$i<$n;$i++){
        $a[$i] = rand(-100,100);
    }
    return $a;
}

function xuatmang($a)
{
    return implode("|",$a);
}

function ktr_cp($num)
{
    if(fmod(sqrt($num),1)==0)
        return true;
    else
        return false;
}

if (isset($_POST['submit'])) {
    $n = $_POST['number'];
    if($n<1 || $n>19)
        $kq = "Nhập lại n";
    else{
        $a = taomang($n);
        $a_cp = [];
        $n_cp = 0;
        for($i=0;$i<$n;$i++){
            if(ktr_cp($a[$i])){
                $a_cp[$n_cp] = $a[$i];
                $n_cp++;
            }
        }
        if(array_sum($a_cp)==0){
            $kq ='Không tồn tại số chính phương thỏa điều kiện';
        }
        else{
            $kq = 'Các số chính phương: ' . xuatmang($a_cp)
                ."\nTổng = " . array_sum($a_cp);
        }
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
    <table align="center" width="50%">
        <tr>
            <td colspan="2" align="center" style="background-color: black; color: white; font-weight: bold">Phát sinh mảng và tính toán</td>
        </tr>
        <tr>
            <td>Nhập n (số nguyên lẻ, {1;19}):</td>
            <td><input type="number" name="number" value="<?php echo isset($n) ? $n : '';?>"></td>
        </tr>
        <tr>
            <td>Mảng phát sinh:</td>
            <td><textarea rows="2" cols="50"><?php echo xuatmang($a);?></textarea></td>
        </tr>
        <tr>
            <td>Kết quả:</td>
            <td><textarea rows="2" cols="50"><?php echo (isset($kq)) ? $kq : ''; ?></textarea></td>
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