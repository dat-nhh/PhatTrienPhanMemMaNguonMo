<?php
$conn = mysqli_connect("localhost", "root", "", "demaugk");
if(!$conn) die("Connection failed: " . mysqli_connect_error());
$matp=$tentp=$tenbt=$qg=$kq='';
if(isset($_POST['submit'])){
    $matp=$_POST['matp'];
    $tentp=$_POST['tentp'];
    $tenbt=$_POST['tenbt'];
    $qg=$_POST['quocgia'];
    $query = "INSERT INTO `thanhpho` (`MaTP`, `TenTP`, `BangTinh`, `MaQG`) VALUES ('$matp', '$tentp', '$tenbt', '$qg');";
    $result = mysqli_query($conn, $query);
    if(!$result) die("Query failed: ");
    else
        $kq = "them thanh cong";
}

if(isset($_POST['reset'])){
    $matp=$tentp=$tenbt=$qg=$kq='';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cau 2</title>
</head>
<body>
<form method="post" action="">
    <table align="center">
        <tr>
            <td colspan="2" align="center"><h4>Thanh pho</h4></td>
        </tr>
        <tr>
            <td>MaTP</td>
            <td><input type="text" name="matp" value="<?php echo $matp?>"></td>
        </tr>
        <tr>
            <td>TenTP</td>
            <td><input type="text" name="tentp" value="<?php echo $tentp?>"></td>
        </tr>
        <tr>
            <td>BangTinh</td>
            <td><input type="text" name="tenbt" value="<?php echo $tenbt?>"></td>
        </tr>
        <tr>
            <td>QuocGia</td>
            <td>
                <select name="quocgia">
                    <?php
                    $query = "SELECT * FROM `quocgia`";
                    $result = mysqli_query($conn, $query);
                    if(!$result) die("Query failed: ");
                    if(mysqli_num_rows($result)!=0){
                        while($row = mysqli_fetch_row($result)){
                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="them">
                <input type="submit" name="reset" value="reset">
                <input type="submit" name="view" value="xem">
            </td>
        </tr>
        <tr>
            <td colspan="2"><?php echo $kq; ?></td>
        </tr>
    </table>
    <?php if(isset($_POST['view'])){ ?>
    <table align="center" border="1">
        <tr style="background-color: #0000fa">
            <td colspan="7" align="center"><h4>Chuyen Bay</h4></td>
        </tr>
        <tr style="background-color: #8bc9e3">
            <td>MaCB</td>
            <td>SoCB</td>
            <td>KhoiHanh</td>
            <td>NgayKH</td>
            <td>KetThuc</td>
            <td>NgayKT</td>
            <td>Gia</td>
        </tr>
        <?php
            $query = "SELECT * FROM `chuyenbay` WHERE KhoiHanh = 121 OR KetThuc = 121";
            $result = mysqli_query($conn, $query);
            if(!$result) die("Query failed: ");
            if(mysqli_num_rows($result)!=0){
                while($row = mysqli_fetch_row($result)){
                    echo "
                    <tr>
                        <td>$row[0]</td>
                        <td>$row[1]</td>
                        <td>$row[2]</td>
                        <td>$row[3]</td>
                        <td>$row[4]</td>
                        <td>$row[5]</td>
                        <td>$row[6]</td>
                    </tr>
                    ";
                }
            }
        ?>
    </table>
    <?php }?>
</form>
</body>
</html>