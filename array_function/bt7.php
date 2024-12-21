<?php
$mang_can = array("Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm");
$mang_chi = array("Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất");
$mang_hinh = array(
    "https://upload.wikimedia.org/wikipedia/commons/d/d7/Boar.svg", //hoi
    "https://upload.wikimedia.org/wikipedia/commons/0/04/Rat.svg", //ty
    "https://upload.wikimedia.org/wikipedia/commons/9/9d/Ox.svg", //suu
    "https://upload.wikimedia.org/wikipedia/commons/e/e3/Tiger.svg", //dan
    "https://upload.wikimedia.org/wikipedia/commons/2/24/Rabbit.svg", //mao
    "https://upload.wikimedia.org/wikipedia/commons/b/b2/Dragon.svg", //thin
    "https://upload.wikimedia.org/wikipedia/commons/1/1d/Snake.svg", //ti
    "https://upload.wikimedia.org/wikipedia/commons/7/76/Horse.svg", //ngo
    "https://upload.wikimedia.org/wikipedia/commons/2/2d/Goat.svg", //mui
    "https://upload.wikimedia.org/wikipedia/commons/9/96/Monkey_2.svg", //than
    "https://upload.wikimedia.org/wikipedia/commons/0/06/Rooster.svg", //dau
    "https://upload.wikimedia.org/wikipedia/commons/4/4a/Dog_2.svg" //tuat
);
if(isset($_POST['submit'])){
    $nam = $_POST['duong'];
    $nam_dl = $nam;
    $nam = $nam - 3;
    $can = $nam%10;
    $chi = $nam%12;
    $nam_al = $mang_can[$can];
    $nam_al = $nam_al . " " . $mang_chi[$chi];
    $hinh = $mang_hinh[$chi];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tìm năm âm lịch</title>
</head>
<body>
<form action="" method="POST">
    <table align="center" style="background-color: cornflowerblue">
        <tr>
            <td style="background-color: mediumblue; color: white; text-align: center" colspan="3"><h4>TÌM NĂM ÂM LỊCH</h4></td>
        </tr>
        <tr>
            <td>Năm dương lịch:</td>
            <td></td>
            <td>Năm âm lịch</td>
        </tr>
        <tr>
            <td><input type="text" name="duong" value="<?php if (isset($nam_dl)) echo $nam_dl; else echo ''; ?>"></td>
            <td><button type="submit" name="submit" style="background-color: navajowhite">=></button></td>
            <td><input type="text" name="am" readonly value="<?php if (isset($nam_al)) echo $nam_al; else echo ''; ?>" style="background-color: navajowhite"></td>
        </tr>
        <tr>
            <td colspan="3" style="text-align: center"> <img id="anh" src="<?php if (isset($hinh)) echo $hinh; else echo '';?>" width="100px"></td>
        </tr>
    </table>
</form>
</body>
</html>
