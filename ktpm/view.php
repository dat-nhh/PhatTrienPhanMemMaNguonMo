<?php
require "config.php";
$kq = '';
$query = "SELECT * FROM `giangvien` WHERE (1=1)";

if (isset($_POST["submit"])) {
    $magv = $_POST["magv"];
    $tengv = $_POST["tengv"];
    if ($magv != '') {
        $query .= " AND (`MaGV` LIKE '%$magv%')";
    }
    if ($tengv != '') {
        $query .= " AND (`HoTen` LIKE '%$tengv%')";
    }
}

// Reset the search
if (isset($_POST["reset"])) {
    $kq = '';
    $query = "SELECT * FROM `giangvien` WHERE (1=1)";
}

// Pagination setup
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $limit; // Offset for the LIMIT clause

// Add pagination to the query
$query .= " LIMIT $limit OFFSET $offset";

// Count total records for pagination
$totalQuery = preg_replace('/SELECT \* FROM `giangvien` WHERE \(1=1\)(.*)$/', 'SELECT COUNT(*) FROM `giangvien` WHERE (1=1)$1', $query);
$totalResult = mysqli_query($conn, $totalQuery);
$totalRows = mysqli_fetch_array($totalResult)[0];
$totalPages = ceil($totalRows / $limit);

// Handle edit and delete requests
if (isset($_POST["edit"])) {
    $magvToEdit = $_POST["magvToEdit"];
    header("Location: edit.php?magv=$magvToEdit");
    exit;
}

if (isset($_POST["delete"])) {
    $magvToDelete = $_POST["magvToDelete"];
    $deleteQuery = "DELETE FROM `giangvien` WHERE `MaGV`='$magvToDelete'";
    if (mysqli_query($conn, $deleteQuery)) {
        $kq = "Xóa giảng viên thành công!";
    } else {
        $kq = "Lỗi khi xóa giảng viên: " . mysqli_error($conn);
    }
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
            <td colspan="2" align="center" style="background-color: red; color: yellow"><h4>Tìm kiếm giảng viên</h4></td>
        </tr>
        <tr style="font-weight: bold">
            <td>Mã giảng viên</td>
            <td><input type="text" name="magv" value="<?php echo isset($magv) ? $magv : '' ?>"></td>
        </tr>
        <tr style="font-weight: bold">
            <td>Họ tên</td>
            <td><input type="text" name="tengv" value="<?php echo isset($tengv) ? $tengv : '' ?>"></td>
        </tr>
        <tr style="font-weight: bold">
            <td colspan="2" align="center" style="color: red"><?php echo $kq ?></td>
        </tr>
        <tr style="font-weight: bold">
            <td align="center" colspan="2">
                <input type="submit" name="submit" value="Tìm kiếm">
                <input type="submit" name="reset" value="Reset dữ liệu">
            </td>
        </tr>
    </table>
    <table align="center" border="1" width="100%">
        <tr style="font-weight: bold">
            <td colspan="10" align="center" style="background-color: red; color: yellow"><h4>Thông tin giảng viên</h4></td>
        </tr>
        <tr style="background-color: bisque">
            <td>Mã giảng viên</td>
            <td>Họ tên</td>
            <td>Ngày sinh</td>
            <td>Quê quán</td>
            <td>Giới tính</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Khoa</td>
            <td>Học vấn</td>
            <td>Chức năng</td>
        </tr>
        <?php
        $result = mysqli_query($conn, $query);
        if (!$result) die("Query failed: ");
        if (mysqli_num_rows($result) != 0) {
            $i = 1;
            while ($row = mysqli_fetch_row($result)) {
                $sex = $row[4] ? 'Nam' : 'Nữ';
                echo "<tr style='" . ($i % 2 == 0 ? "background-color: lightblue" : "") . "'>";
                echo "<td>$row[0]</td>
                  <td>$row[1]</td>
                  <td>$row[2]</td>
                  <td>$row[3]</td>
                  <td>$sex</td>
                  <td>$row[5]</td>
                  <td>$row[6]</td>
                  <td>$row[7]</td>
                  <td>$row[8]</td>
                  <td>
                      <form method='post' action=''>
                          <input type='hidden' name='magvToEdit' value='$row[0]'>
                          <input type='hidden' name='magvToDelete' value='$row[0]'>
                          <input type='submit' name='edit' value='Sửa'>
                          <input type='submit' name='delete' value='Xóa' onclick=\"return confirm('Bạn có chắc chắn muốn xóa không?');\">
                      </form>
                  </td>
              </tr>";
                $i++;
            }
        }
        ?>
    </table>
</form>

<!-- Pagination Controls -->
<div style="text-align: center;">
    <?php if ($totalPages > 1): ?>
        <div>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?php echo $i; ?>" style="margin: 0 5px;"><?php echo $i; ?></a>
            <?php endfor; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>