<!DOCTYPE html>
<html lang="ko-KR" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="CHANWOO" />
    <meta name="author" content="chanwookim@me.com" />
    <title>chanwoo</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>

<?php
include 'header.php';
session_start();

$id = $_POST['id'];
$pw = $_POST['password']; # comment
$query = "select count(*),member_id from member where email = '$id' and password = '$pw'";
$result = mysqli_query($connect, $query);
$login=mysqli_fetch_row($result);

if($login[0]=='1')
{
    $_SESSION['member_id']=$login[1];
}

if(!isset($_SESSION['member_id'])) {
    ?>


<section>

    <form method="POST" action="login.php" >
        <ul style="margin-left: 100px;">
            <li><input type="text" name="id" placeholder="id"/></li>
            <li><input type="password" name="password" placeholder="password"/></li>
            <li><input type="submit" value="login"/></li>
        </ul>
    </form>

</section>
<?php
  //  echo "<meta http-equiv='refresh' content='0;url=login.php'>";
  //  exit;
}
else {
    //$member_id = $_SESSION['user_id'];
    echo "<meta http-equiv='refresh' content='0;url=index.php'>";
    /*
    echo "<p>안녕하세요. $id 님</p>";
    echo "<p><a href='logout.php'>로그아웃</a></p>";
    */
}
?>



</body>

</html>







