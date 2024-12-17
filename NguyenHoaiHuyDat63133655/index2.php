<?php
$conn = mysqli_connect("localhost","root","","nguyenhoaihuydat");
if(!$conn){
    die("Connection failed: ".mysqli_connect_error());
}
$magv = $tengv = $ntns = $que = $sdt = $mail = $gt = $khoa = $hv = $kq ='';

if(isset($_POST['submit'])){
    $magv = $_POST['magv'];
    $tengv = $_POST['tengv'];
    $ntns = $_POST['ntns'];
    $que = $_POST['que'];
    $sdt = $_POST['sdt'];
    $mail = $_POST['mail'];
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
}

if(isset($_POST['reset'])){
    $magv = $tengv = $ntns = $que = $sdt = $mail = $gt = $khoa = $hv = $kq ='';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Câu 2</title>
</head>
<body>
<form method="post" action="">
    <table align="center" style="background-color: bisque">
        <tr>
            <td colspan="2" align="center" style="background-color: red; color: yellow"><h4>Nhập dữ liệu giảng viên</h4></td>
        </tr>
        <tr>
            <td>Mã giảng viên</td>
            <td><input type="text" name="magv" value="<?php echo $magv ?>"></td>
        </tr>
        <tr>
            <td>Họ tên</td>
            <td><input type="text" name="tengv" value="<?php echo $tengv ?>"></td>
        </tr>
        <tr>
            <td>Ngày sinh</td>
            <td><input type="date" name="ntns" value="<?php echo $ntns ?>"></td>
        </tr>
        <tr>
            <td>Quê quán</td>
            <td><input type="text" name="que" value="<?php echo $que ?>"></td>
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
            <td><input type="text" name="sdt" value="<?php echo $sdt ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="mail" value="<?php echo $mail ?>"></td>
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
        <tr>
            <td colspan="2" align="center" style="color: red"><?php echo $kq?></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="submit" name="submit" value="Thêm dữ liệu">
                <input type="submit" name="reset" value="Reset dữ liệu">
                <input type="submit" name="view" value="Xem kết quả">
            </td>
        </tr>
    </table>
    <?php if(isset($_POST['view'])){ ?>
        <table align="center" border="1" style="background-color: bisque">
            <tr style="background-color: red; color: yellow">
                <td colspan="9" align="center"><h4>Thông tin giảng viên</h4></td>
            </tr>
            <tr style="background-color: #8bc9e3">
                <td>Mã giảng viên</td>
                <td>Họ tên</td>
                <td>Ngày sinh</td>
                <td>Quê quán</td>
                <td>Giới tính</td>
                <td>Số điện thoại</td>
                <td>Email</td>
                <td>Khoa</td>
                <td>Học vấn</td>
            </tr>
            <?php
            $query = "SELECT * FROM `giangvien` WHERE HocVan = 'tien' AND YEAR(ntns)>1990";
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
                        <td>$row[7]</td>
                        <td>$row[8]</td>
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
