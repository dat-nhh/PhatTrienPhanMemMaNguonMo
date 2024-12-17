<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $country = $_POST['country'];
    $study = isset($_POST['study']) ? (is_array($_POST['study']) ? implode(", ", $_POST['study']) : $_POST['study']) : "None";
    $note = $_POST['note'];
} else {
    header("Location: bt8_form.html");
}
if(isset($_POST['back'])){
    header("Location: bt8_form.html");
}
if(isset($_POST['cancel'])){
    $fullname = "";
    $address = "";
    $phone = "";
    $gender = "";
    $country = "";
    $study = "";
    $note = "";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIG</title>
</head>
<body>
<p>Bạn đã nhập thành công, dưới đây là những thông tin bản đã nhập:</p>
<p>Full Name: <?php echo $fullname; ?></p>
<p>Address: <?php echo $address; ?></p>
<p>Phone: <?php echo $phone; ?></p>
<p>Gender: <?php echo $gender; ?></p>
<p>Country: <?php echo $country; ?></p>
<p>Study: <?php echo $study; ?></p>
<p>Note: <?php echo $note; ?></p>
<form action="">
    <input type="submit" name="back" value="Quay về">
</form>

<form action="">
    <input type="submit" name="cancel" value="Hủy">
</form>
</body>
</html>
