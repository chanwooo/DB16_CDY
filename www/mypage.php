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

if(!isset($_SESSION['member_id'])) {
    echo "not login";
    exit;
}
$sql="select mileage from shop.member where member_id=$member_id";
$result3=mysqli_query($connect,$sql);
$row3=mysqli_fetch_array($result3);

    echo "<p>안녕하세요. $member_id 님</p>";
	echo "보유 마일리지 : ";
	echo $row3['mileage']; echo "<br/>";

    echo "<p><a href='logout.php'>로그아웃</a></p>";


?>
<h1 align="center">구매내역</h1><br/>
<center>
	<table border="1px" width="800px">
		<tr>
		<td align="center" width="20px"></td>
		<td align="center" width="120px">이미지</td>
		<td align="center" width="150px">상품명</td>
		<td align="center" width="100px">사이즈</td>
		<td align="center" width="50px">수량</td>
		<td align="center" width="130px">가격(원)</td>
		<td align="center">주문일자</td>
		</tr>
	</table>
	</center><br/>
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

	$sql="select item_name, cost, item_id from shop.item where item_id=(select item_id from shop.size where itemsize_id=$itemsize_id)";
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
	
	$sql="select * from shop.size where itemsize_id=$itemsize_id";
	$result2=mysqli_query($connect,$sql);
	$row2=mysqli_fetch_array($result2);


?>	
	
	<form action="confirm.php" method="get">
	<center>
	<table border="1px" width="800px">
		<tr>
		<td align="center" width="20px" ><input type="radio" name="order_id" value="<?= $row['order_id'] ?>"></td>
		<td align="center" width="120px"><img src = "img/<?=$row1['item_id'];?>.jpg" width="100px"/></td>
		<td align="center" width="150px"><?=$row1['item_name']; ?></td>
		<td align="center" width="100px"><?=$row2['item_size']; ?></td>
		<td align="center" width="50px"><?=$row['amount']; ?></td>
		<td align="center" width="130px"><?=$row1['cost']; ?></td>
		<td align="center"><?=$row['order_date'];?></td>
		</tr>
	</table>
	</center>
	<br>
<?php
}
?>
<br><br>
<center>
      <input type="submit" class="ct-btn white large" value="자세히보기">
</center>

</body>

</html>