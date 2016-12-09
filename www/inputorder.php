<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
       <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<?php include 'header.php';?>
<?php

function error($message) {
echo"<script language=javascript>
alert('$message');
history.go(-1);
</script>";
exit;
}	

if(isset($_SESSION['member_id']))
{
$item_name=$_GET["itemName"];
$amount=$_GET["amount"];
$name=$_GET["name"];
$how_to_pay=$_GET["pay"];
$address=$_GET["address"];
$phoneno=$_GET["phoneNo"];

//$member_id=1; 필요없는걸까나
$itemsize_id=2;
$order_date="20161205";


$sql="insert into shop.orderlist (itemsize_id,member_id,order_date,how_to_pay,address,phoneno,amount) values ($itemsize_id,$member_id,'$order_date','$how_to_pay','$address','$phoneno',$amount)";

$result = mysqli_query($connect,$sql);

if($result==true){
	echo "성공적으로 전달되었습니다.";
}
else{
	echo "입력실패";
}
}else{
	error('로그인 해주세요');
}

?>
</body>

</html>