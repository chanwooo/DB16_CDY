<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
       <link rel="stylesheet" type="text/css" href="css/style.css"/>
<!--
<style>
	div{
		float:left;
		margin-left:15px;
	}
</style>-->
</head>
<body>
<?php
include 'header.php';
?>

<?php
$order_id=$_GET["order_id"];
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

?>
	<h1>주문확인</h1>
	<hr color="black" size="2" align="left"><br/>
	<table border="1">
		<tr>
			<td>상품번호</td>
			<td>상품명</td>
			<td>주문개수</td>
			<td>판매자</td>
			<td>주문상태</td>
		</td>
		<tr>
			<td><?php echo $row3['item_id']; ?></td>
			<td><?php echo $row3['item_name']; ?></td>
			<td><?php echo $row['amount']; ?></td>
			<td>...</td>
			<td>...</td>
		</tr>
	</table>
	<div><br/>
	배송지정보
		<table border="1px">
			<tr>
				<td bgcolor="#D5D5D5">받으시는분</td>
				<td><?php echo $row2['member_name']; ?></td>
			</tr>
			<tr>
				<td bgcolor="#D5D5D5">연락처</td>
				<td><?php echo $row['phoneno']; ?></td>
			</tr>
			<tr>
				<td bgcolor="#D5D5D5">주소</td>
				<td><?php echo $row['address']; ?></td>
			</tr>
			<tr>
				<td bgcolor="#D5D5D5">배송시 요구사항</td>
				<td>...</td>
			</tr>
		</table>

	</div>
    <div><br/>
	결제정보
		<table border="1px">
			<tr>
				<td bgcolor="#D5D5D5">최종결제금액</td>
				<td><?php echo $row3['cost']; ?></td>
			</tr>
			<tr>
				<td bgcolor="#D5D5D5">결제방법</td>
				<td><?php echo $row['how_to_pay']; ?></td>
			</tr>
			<tr>
				<td bgcolor="#D5D5D5">결제번호</td>
				<td>...</td>
			</tr>
			<tr>
				<td bgcolor="#D5D5D5">주문일자</td>
				<td><?php echo $row['order_date']; ?></td>
			</tr>
		</table>
	</div>

</body>

</html>
