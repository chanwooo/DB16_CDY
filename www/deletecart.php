<?php
$connect = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");
session_start();

$member_id=$_SESSION['member_id'];
$itemsize_id=$_GET['<?=$itemsize_id?>'];
$query="delete from cart where itemsize_id=$itemsize_id and member_id=$member_id";
mysqli_query($connect,$query);
echo "$itemsize_id";
?>

