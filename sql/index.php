<?php
$name = $family = $address = $msg = "";
require "config.php";

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $family = $_POST["family"];
    $address = $_POST["address"];
    $class = $_POST["class"];
    $query = "INSERT INTO `thongtinsv`(`Ho`, `Ten`, `DiaChi`, `MaLop`) VALUES ('$family','$name','$address','$class')";
    $result = mysqli_query($conn,$query);
    if(!$result) die("\nQuery failed");
    else $msg = "Ghi dữ liệu thành công";
}
if(isset($_POST["reset"])){
    $name = $family = $address = $msg = "";
}
if(isset($_POST["show"])){
    header("Location: view.php");
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thông tinh sinh viên</title>
</head>
<body>
<form method="post" action="">
    <table align="center" style="background-color: bisque">
        <tr>
            <td align="center" colspan="2"> <h4>NHẬP THÔNG TIN SINH VIÊN</h4> </td>
        </tr>
        <tr>
            <td>Tên</td>
            <td><input type="text" name="name" value="<?php echo $name;?>"></td>
        </tr>
        <tr>
            <td>Họ</td>
            <td><input type="text" name="family" value="<?php echo $family;?>"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="address" value="<?php echo $address;?>"></td>
        </tr>
        <tr>
            <td><label for="class">Lớp</label></td>
            <td>
                <select name="class" id="class">
                    <?php
                    $query = "SELECT * FROM `thongtinlop`;";
                    $result = mysqli_query($conn, $query);
                    if(!$result) die("\nQuery failed");
                    if(mysqli_num_rows($result) != 0){
                        while($row = mysqli_fetch_array($result)){
                            $str = "<option value='".$row['MaLop']."'>".$row['TenLop']."</option>";
                            echo $str;
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="submit" value="Gửi">
                <input type="submit" name="reset" value="Xóa">
                <input type="submit" name="show" value="Xem kết quả">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" style="color: red"><?php echo $msg;?></td>
        </tr>
    </table>
</form>

</body>
</html>