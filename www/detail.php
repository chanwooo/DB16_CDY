<!DOCTYPE html>
<html lang="ko-KR">
<head>
    <meta charset="utf-8"/>


    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <title>제품상세</title>
</head>

<body>
<?php include 'header.php'?>

<img style="float: left" src="img/20150405_144959.jpg" width="300" height="300">
<div>
    <h3>옷</h3>
    <table border="0">
        <tr>
            <td>가격</td>
            <td>안팔아요.</td>
        </tr>
        <tr>
            <td>적립금(1%)&nbsp;&nbsp;&nbsp;</td>
            <td>0</td>
        </tr>
        <tr>
            <td>제조사</td>
            <td>몰라요</td>
        </tr>
    </table><br>
    <from>사이즈선택<br>
        <select name="size" required>
            <option value="0" selected disabled>선택하세요</option>
            <option value="2">S</option>
            <option value="3">M</option>
            <option value="4">L</option>
        </select>
        <br><br>
        수량<br>
        <input type="number"min="1"max="10"step="1" value="1"name="amount"><br><br>
        <input type="submit" value="ADD TO CART"><input type="submit" value=" BUY IT NOW "><br><br><br><br>
    </from>
</div>
</body>

</html>