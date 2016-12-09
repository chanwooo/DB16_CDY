<meta charset="utf-8"/>
<?php
$connect = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");
session_start();


if(!isset($_SESSION['member_id'])) {
?>
<script language=javascript>
 alert('Login이 필요합니다..');
 </script>
<meta http-equiv='refresh' content='0;url=login.php'>
<?php
exit;}


$member_id=$_SESSION['member_id'];
$size = $_GET['size'];
$amount = $_GET['amount'];
$query="insert into cart (member_id,itemsize_id,amount) values ($member_id,$size,$amount)";
mysqli_query($connect,$query);

?>

<script language=javascript>
 alert('카트에 추가되었습니다');
 </script>

<meta http-equiv='refresh' content='0;url=cart.php'>
