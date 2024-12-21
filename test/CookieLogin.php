<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
<?php
    $cookie_name = "user";
    if(isset($_POST["login"])){
        $cookie_value = $_POST["user"];
    }
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
    if ( isset ( $_COOKIE [ $cookie_name ]) ) {
        echo "Hi " . $cookie_value  ."!  Welcome to my site!" ;
    } else {
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