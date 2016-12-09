<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
       <link rel="stylesheet" type="text/css" href="../css/style.css"/>
</head>
<body>
<?php include '../header.php';?>
<?php
//$item_name=$_GET["itemName"];
$amount=$_GET["amount"];
//$name=$_GET["name"];
$how_to_pay=$_GET["pay"];
$address=$_GET["address"];
$phoneno=$_GET["phoneNo"];
//$sql="insert into shop.item (item_name,cost,totalSale_rate) values ('면바지',20000,0)";
$member_id=1;
$itemsize_id=2;
$order_date="20161205";
$a="라운드티";
$b=5000;
$c=0;
//$sql="insert into shop.item (item_name,cost,totalSale_rate) values ('$a',$b,$c)";

$sql="insert into shop.orderlist (itemsize_id,member_id,order_date,how_to_pay,address,phoneno,amount) values ($itemsize_id,$member_id,'$order_date','$how_to_pay','$address','$phoneno',$amount)";

$result = mysqli_query($connect,$sql);

if($result==true){
	echo "성공적으로 전달되었습니다.";
}
else{
	echo "입력실패";
}

?>
</body>

</html>