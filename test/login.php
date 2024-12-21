<html>
<body>
<?php
if ($_POST["user"]=="admin" && $_POST["pass"]=="12345") {
    echo '<p style="color: red; font-family: Tahoma">welcome, admin</p>';
}
else {
    echo 'Username hoặc password sai. Vui lòng nhập lại';
}
?>
</body>
</html>