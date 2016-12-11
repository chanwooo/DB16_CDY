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
function error($message) {
 echo"<script language=javascript>
 alert('$message');
 history.go(-1);
 </script>";
 exit;
}

$member_id=$_SESSION['member_id'];
$size = $_GET['size'];
$amount = $_GET['amount'];


if($size==null)
{
 error('사이즈를 선택해주세요');

}

$query="delete from cart where member_id=$member_id";
mysqli_query($connect,$query);

$query="insert into cart (member_id,itemsize_id,amount) values ($member_id,$size,$amount)";
mysqli_query($connect,$query);

?>
<meta http-equiv='refresh' content='0;url=order.php'>

