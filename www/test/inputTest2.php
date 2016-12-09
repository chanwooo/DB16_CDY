<?php include 'header.php';?>
<?php
$a=$_GET["item_name"];
$b=$_GET["cost"];
$c=$_GET["totalSale_rate"];
//$sql="insert into shop.item (item_name,cost,totalSale_rate) values ('면바지',20000,0)";
$sql="insert into shop.item (item_name,cost,totalSale_rate) values ($a,$b,$c)";
$result = mysqli_query($connect,$sql);
echo "성공적으로 전달되었습니다.";
?>