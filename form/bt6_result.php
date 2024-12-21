<?php
function calculate($num1, $num2, $operation) {
    switch($operation) {
        case 'Cộng':
            return $num1 + $num2;
        case 'Trừ':
            return $num1 - $num2;
        case 'Nhân':
            return $num1 * $num2;
        case 'Chia':
            if ($num2 != 0) {
                return round($num1 / $num2);
            } else {
                return "Không thể chia cho 0";
            }
        default:
            return "Phép tính không hợp lệ";
    }
}

if(isset($_POST["num1"]) && isset($_POST["num2"]) && isset($_POST["operation"])) {
    $operation = $_POST['operation'];
    if(is_numeric($_POST['num1']) && is_numeric($_POST['num2'])) {
        $num1 = floatval($_POST['num1']);
        $num2 = floatval($_POST['num2']);
        $result = calculate($num1, $num2, $operation);
    }
    else{
        $result = "Input phải là số";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHÉP TÍNH TRÊN HAI SỐ</title>
</head>
<body>

<div class="result-box">
    <table align="center" style="border-collapse: collapse; margin-top: 20px;">
        <tr>
            <th colspan="2" style="color: cornflowerblue"><h4>PHÉP TÍNH TRÊN HAI SỐ</h4></th>
        </tr>
        <tr>
            <td  align="right" style="color: brown; font-weight: bold">Phép tính:</td>

            <td><input type="text" readonly value="<?php echo $operation; ?>"></td>
        </tr>
        <tr>
            <td  align="right" style="color: blue">Số thứ nhất:</td>
            <td><input type="text" readonly value="<?php echo $num1; ?>"></td>
        </tr>
        <tr>
            <td  align="right" style="color: blue">Số thứ hai:</td>
            <td><input type="text" readonly value="<?php echo $num2; ?>"></td>
        </tr>
        <tr>
            <td  align="right" style="color: blue">Kết quả:</td>
            <td><input type="text" readonly value="<?php echo $result; ?>"></td>
        </tr>
        <tr>
            <td></td>
            <td style="text-align: center;"><a href="javascript:window.history.back(-1);" style="color: purple">Trở về trang trước</a></td>
        </tr>
    </table>
</div>
</body>
</html>

