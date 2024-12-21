<?php
// Nguyễn Hoài Huy Đạt 63133655 Bài tập 2
$s = "HOW ARE YOU";
$s = str_replace(' ', '', $s);
$so_chu = rand(2,strlen($s));
while (strlen($s) > 0) {
    for ($j = 0; $j < $so_chu; $j++) {
        $tu = random_int(0,strlen($s));
        while ($tu != null)
            $tu = random_int(0,strlen($s));
        echo $s[$tu];
        $s[$tu] = " ";
        $s = str_replace(' ', '', $s);
    }
    echo "\n";
}