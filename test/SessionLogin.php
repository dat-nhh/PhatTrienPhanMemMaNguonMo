<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
session_start();
if(isset($_POST['login'])){
    $_SESSION['username'] = $_POST['user'];
}
if(isset($_POST['delete'])){
    session_destroy();
    header("Location:SessionLogin.php");
}
if(isset($_SESSION['username'])){
    echo $_SESSION['username'];
?>
<form action="" method="post">
    <input type="submit" name="delete" value="delete">
</form>
<?php
} else{
?>
<form action="" method="post">
    username: <input type="text" name="user"><br>
    password: <input type="password" name="pass"><br>
    <input type="submit" name="login" value="Login">
</form>
<?php
}
?>
</body>
</html>