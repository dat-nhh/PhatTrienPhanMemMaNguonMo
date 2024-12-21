<?php
$chi =0;
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p><?php echo $mang_hinh[$chi]; ?></p>
<img src="<?php echo $mang_hinh[$chi]; ?>">
</body>
</html>