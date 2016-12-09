<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
       <link rel="stylesheet" type="text/css" href="css/style.css"/>

<style>
.ct-btn.large {
	width: 600px;
	height: 46px;
	padding: 0 1em;
	font-size: 18px;
	font-weight: 600;
	line-height: 46px;
}
</style>
</head>
<body>
<?php
include 'header.php';
?>
<h1 align="center">구매내역</h1><br/>
<?php

$sql="select * from shop.orderlist where member_id=$member_id order by order_id desc";
$result=mysqli_query($connect,$sql);
/* 쿼리 테스트
if($result==true){
	echo "불러오기성공";
}
else{
	echo "불러오기실패";
}
*/

while($row=mysqli_fetch_array($result)){
	$itemsize_id=$row['itemsize_id'];

	$sql="select item_name, cost from shop.item where item_id=(select item_id from shop.size where itemsize_id=$itemsize_id)";
	$result1=mysqli_query($connect,$sql);
	/* 쿼리 테스트
	if($result1==true){
		echo "불러오기성공";
	}
	else{
		echo "불러오기실패";
	}
	*/
	$row1=mysqli_fetch_array($result1);

?>	
	<form action="confirm.php" method="get">
	<center>
	<div style="border:1px solid; padding:10px; width:700px">
	<table>
		<tr>
		<td><input type="radio" name="order_id" value="<?= $row['order_id'] ?>"></td>
		<td>상품 이름 : <?=$row1['item_name']; ?></td>
		<td>구매 수량 : <?=$row['amount']; ?></td>
		<td>가격 : <?=$row1['cost']; ?></td>
		</tr>
	</table>
	</div>
	</center>
	<br>
<?php
}
?>
<br><br>
<center>
      <input type="submit" class="ct-btn white large" value="자세히보기">
</center>


<!--
$sql = "SELECT * FROM shop.orderlist where order_id=$order_id";

$result = mysqli_query($connect,$sql);

$row = mysqli_fetch_array($result);

$sql = "SELECT member_name from shop.member where member_id=(select member_id from shop.orderlist where order_id=$order_id)";

$result2 = mysqli_query($connect,$sql);

$row2 = mysqli_fetch_array($result2);

$sql = "select item_id, item_name, cost from shop.item where item_id=
	(select item_id from shop.size where itemsize_id=
		(select itemsize_id from shop.orderlist where order_id=$order_id))";

$result3 = mysqli_query($connect,$sql);

$row3 = mysqli_fetch_array($result3);

$sql="select vendor_name from shop.vendor where vendor_id=
(select vendor_id from shop.vendor_item where item_id=
(select item_id from shop.size where itemsize_id=
(select itemsize_id from shop.orderlist where order_id=$order_id)))";
$result4 = mysqli_query($connect,$sql);

$row4 = mysqli_fetch_array($result4);
-->

	
</body>

</html>