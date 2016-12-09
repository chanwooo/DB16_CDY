<!DOCTYPE html>
<html lang="ko-KR">
<head>
    <meta charset="utf-8">
    <meta name="description" content="DB16_CDY_SHOP" />
    <meta name="author" content="chanwookim@me.com" />

    <link rel="stylesheet" type="text/css" href="css/style.css"/>


</head>
<body>
<?php
include 'header.php';
/**
 * Created by PhpStorm.
 * User: chanwoo
 * Date: 2016. 11. 30.
 * Time: 오후 11:37
 */
?>

<?php
$email=$_POST["email"];
$password=$_POST["password"];
$password2=$_POST["password2"];
$member_name=$_POST["member_name"];
$phoneNo=$_POST["phoneNo"];
$address=$_POST["address"];

$query1="select * from member";
 $result=mysqli_query($connect,$query1);


 function error($message) {
 echo"<script language=javascript>
 alert('$message');
 history.go(-1);
 </script>";
 exit;
 }

 if ($password != $password2) {
 	error('비밀번호를 다시 확인해주세요');
 }
 
while ($row = mysqli_fetch_array($result)){
	if($row[1] == $email){
	 error('이미 가입된 아이디입니다');
	}
}

 $email=addslashes($email);
 $password=addslashes($password);
 $member_name=addslashes($member_name);
 $phoneNo=addslashes($phoneNo);
 $address=addslashes($address);

 $query="insert into member (email,password,member_name,phoneNo,address) values ('$email','$password','$member_name','$phoneNo','$address')";
 mysqli_query($connect,$query);
?>
<script language=javascript>
 alert('가입되셨습니다');

 </script>

<meta http-equiv='refresh' content='0;url=index.php'>
</body>
</html>
