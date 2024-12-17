<?php
require "config.php";
$kq ='';

$query = "SELECT * FROM `giangvien`";
$result = mysqli_query($conn,$query);
if(!$result){
    die("Query failed");
}
if(mysqli_num_rows($result) != 0){
    while ($row = mysqli_fetch_row($result)){
        $magv = intval($row[0])+1;
    }
}
$magv = strval($magv);

if (isset($_POST['submit'])) {
    $tengv = trim($_POST['tengv']);
    $ntns = trim($_POST['ntns']);
    $que = trim($_POST['que']);
    $sdt = trim($_POST['sdt']);
    $mail = trim($_POST['mail']);
    $errors = [];

    if (empty($tengv) || preg_match('/\d/', $tengv) || preg_match('/[^a-zA-Z\s]/', $tengv) || strpos($tengv, ' ') === 0) {
        $errors[] = "Họ tên giảng viên không hợp lệ.";
    }
    if (empty($ntns)) {
        $errors[] = "Ngày sinh không được để trống.";
    } else {
        $dob = new DateTime($ntns);
        $today = new DateTime();
        if ($dob >= $today) {
            $errors[] = "Ngày sinh phải nhỏ hơn ngày hiện tại.";
        }
    }
    if (empty($que) || preg_match('/[^a-zA-Z0-9\s]/', $que)) {
        $errors[] = "Quê quán không hợp lệ.";
    }
    if (empty($sdt) || preg_match('/[^0-9]/', $sdt)) {
        $errors[] = "Số điện thoại không hợp lệ.";
    }
    if (empty($mail) || !filter_var($mail, FILTER_VALIDATE_EMAIL) || preg_match('/[^a-zA-Z0-9@._]/', $mail)) {
        $errors[] = "Email không hợp lệ.";
    }

    if (empty($errors)) {
        $gt = $_POST['gt'];
        $khoa = $_POST['khoa'];
        $hv = $_POST['hv'];
        $query = "INSERT INTO `giangvien` (`MaGV`, `HoTen`, `NTNS`, `QueQuan`, `GioiTinh`, `SDT`, `Email`, `Khoa`, `HocVan`) 
        VALUES ('$magv', '$tengv', '$ntns', '$que', '$gt','$sdt', '$mail', '$khoa', '$hv')";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query failed");
        }
        else{
            $kq = "Thêm thành công";
        }
        $query = "SELECT * FROM `giangvien`";
        $result = mysqli_query($conn,$query);
        if(!$result){
            die("Query failed");
        }
        if(mysqli_num_rows($result) != 0){
            while ($row = mysqli_fetch_row($result)){
                $magv = intval($row[0])+1;
            }
        }
        $magv = strval($magv);
    } else {
        foreach ($errors as $error) {
            $kq .= $error . "<br>";
        }
    }
}

if(isset($_POST['reset'])){
    $tengv = $ntns = $que = $sdt = $mail = $gt = $khoa = $hv = $kq ='';
    $query = "SELECT * FROM `giangvien`";
    $result = mysqli_query($conn,$query);
    if(!$result){
        die("Query failed");
    }
    if(mysqli_num_rows($result) != 0){
        while ($row = mysqli_fetch_row($result)){
            $magv = intval($row[0])+1;
        }
    }
    $magv = strval($magv);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý Giảng Viên</title>
</head>
<body>
<div id="menu">
    <a href="index.php">Thêm</a>&nbsp;|&nbsp;
    <a href="view.php">Xem</a>
</div>
<form method="post" action="">
    <table align="center" style="background-color: bisque">
        <tr>
            <td colspan="2" align="center" style="background-color: red; color: yellow"><h4>Nhập dữ liệu giảng viên</h4></td>
        </tr>
        <tr>
            <td>Mã giảng viên</td>
            <td><input type="text" name="magv" readonly value="<?php echo isset($magv) ? $magv : '' ?>" style="background-color: lightpink"></td>
        </tr>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="tengv" value="<?php echo isset($tengv) ? $tengv : '' ?>"></td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td><input type="date" name="ntns" value="<?php echo isset($ntns) ? $ntns : '' ?>"></td>
        </tr>
        <tr>
            <td>Quê quán</td>
            <td><input type="text" name="que" value="<?php echo isset($que) ? $que : '' ?>"></td>
        </tr>
        <tr>
            <td>Giới tính</td>
            <td>
                <select name="gt">
                    <option value="1">Nam</option>
                    <option value="0">Nữ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>Số điện thoại</td>
            <td><input type="text" name="sdt" value="<?php echo isset($sdt) ? $sdt : '' ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="mail" value="<?php echo isset($mail) ? $mail : '' ?>"></td>
        </tr>
        <tr>
            <td>Khoa</td>
            <td>
                <select name="khoa">
                    <?php
                    $query = "SELECT * FROM `khoa`";
                    $result = mysqli_query($conn,$query);
                    if(!$result){
                        die("Query failed");
                    }
                    if(mysqli_num_rows($result) != 0){
                        while ($row = mysqli_fetch_row($result)){
                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Học vấn</td>
            <td>
                <select name="hv">
                    <?php
                    $query = "SELECT * FROM `hocvi`";
                    $result = mysqli_query($conn,$query);
                    if(!$result){
                        die("Query failed");
                    }
                    if(mysqli_num_rows($result) != 0){
                        while ($row = mysqli_fetch_row($result)){
                            echo "<option value='".$row[0]."'>".$row[1]."</option>";
                        }
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr style="font-weight: bold">
            <td colspan="2" align="center" style="color: red"><?php echo $kq?></td>
        </tr>
        <tr style="font-weight: bold">
            <td align="center" colspan="2">
                <input type="submit" name="submit" value="Thêm dữ liệu">
                <input type="submit" name="reset" value="Reset dữ liệu">
            </td>
        </tr>
    </table>
</form>
</body>
</html>
