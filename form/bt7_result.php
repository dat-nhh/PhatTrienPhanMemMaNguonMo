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
    $num1_raw = isset($_POST['num1']) ? $_POST['num1'] : '';
    $num2_raw = isset($_POST['num2']) ? $_POST['num2'] : '';
    $operation = $_POST['operation'];

    if (!is_numeric($num1_raw) || !is_numeric($num2_raw)) {
        echo "<script>
            alert('Dữ liệu nhập không hợp lệ. Vui lòng nhập số hợp lệ!');
            window.history.back();
          </script>";
    }

    $num1 = floatval($num1_raw);
    $num2 = floatval($num2_raw);

    if ($operation === 'Chia' && $num2 == 0) {
        echo "<script>
            alert('Không thể chia cho 0. Vui lòng nhập lại số!');
            window.history.back();
          </script>";
        exit;
    }

    $result = calculate($num1, $num2, $operation);
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