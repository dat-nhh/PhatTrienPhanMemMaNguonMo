<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHÉP TÍNH TRÊN HAI SỐ</title>
</head>
<body>

<form action="bt7_result.php" method="POST">
    <table align="center" style="border-collapse: collapse;">
        <tr>
            <th colspan="2" style="color: cornflowerblue"><h4>PHÉP TÍNH TRÊN HAI SỐ</h4></th>
        </tr>
        <tr>
            <td align="right"><label for="operation" style="color: brown; font-weight: bold">Chọn phép tính:</label></td>
            <td>
                <input type="radio" id="operation_add" name="operation" value="Cộng" checked>
                <label for="operation_add">Cộng</label>
                <input type="radio" id="operation_subtract" name="operation" value="Trừ">
                <label for="operation_subtract">Trừ</label>
                <input type="radio" id="operation_multiply" name="operation" value="Nhân">
                <label for="operation_multiply">Nhân</label>
                <input type="radio" id="operation_divide" name="operation" value="Chia">
                <label for="operation_divide">Chia</label>
            </td>
        </tr>
        <tr>
            <td align="right"><label for="num1" style="color: blue">Số thứ nhất:</label></td>
            <td><input type="text" id="num1" name="num1" required></td>
        </tr>
        <tr>
            <td align="right"><label for="num2" style="color: blue">Số thứ hai:</label></td>
            <td><input type="text" id="num2" name="num2" required></td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: center;"><input type="submit" value="Tính"></td>
        </tr>
    </table>
</form>
</body>
</html>
