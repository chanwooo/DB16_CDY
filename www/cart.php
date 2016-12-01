<!DOCTYPE html>
<html lang="ko-KR">
<head>
    <meta charset="utf-8"/>

 <link rel="stylesheet" type="text/css" href="css/style.css"/>

 <title>장바구니</title>

</head>
<body>
<?php include 'header.php'?>
<div>
<from>
<table border="0">
 <caption> CART </caption>
 <tr>
 <th width="10"><input type="checkbox" onclick="cartchkall();"/></th>
 <th width="130">이미지</th>
 <th width="400">상품정보</th>
 <th width="80">가격</th>
 <th width="50">수량</th>
 <th width="70">적립금</th>
 </tr>
<tr height="140">
<td align="center">
<input type="checkbox"name="item"value="itemid">
</td>
<td align="center">
<img style="float: left" src="img/20150405_144959.jpg" width="100" height="100">
</td>
 <td align="center">상품정보</td>
 <td align="center">가격</td>
 <td align="center">수량</td>
 <td align="center">적립금</td>
</tr>
</table>
<br><br>
<table border="0" width="790" height="100">
 <tr>
 <td align="center">총 상품금액</td>
 <td align="center">배송비</td>
 <td align="center">결제예정금액</td>
 </tr>
 <tr>
 <th>50000</th>
 <th>2000</th>
 <th>52000</th>
 </tr>

</table>
<br><br><br>
<input type="submit"value="주문하기">
</from>
</div>

</body>

</html>