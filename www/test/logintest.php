<!DOCTYPE html>
<meta charset="utf-8" />
<?php
session_start();
//if(!isset($_SESSION['user_id']) || !isset($_SESSION['user_name'])) {
//    echo "<meta http-equiv='refresh' content='0;url=logintest.php'>";
//    exit;
//}

$db = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");
$id = $_POST['id'];
$pw = $_POST['password']; # comment
$query = "select count(*),email from member where email = '$id' and password = '$pw'";
$result = mysqli_query($db, $query);
$login=mysqli_fetch_row($result);
if($login[0]=='1')
{
    $_SESSION['user_id']=$login[1];
}

if(!isset($_SESSION['user_id'])) {
    //   echo "<meta http-equiv='refresh' content='0;url=login.php'>";
    echo "not login";
//    exit;

    ?>
    <form method='post'>
        <table>
            <tr>
                <td>아이디</td>
                <td><input type='text' name='id'/></td>
                <td rowspan='2'><input type='submit' tabindex='3' value='로그인' style='height:50px'/></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td><input type='password' name='password' tabindex='2'/></td>
            </tr>
        </table>
    </form>

<?php
}
?>

<?php

$user_id = $_SESSION['user_id'];

echo "<p>안녕하세요. $user_id 님</p>";

echo "<p><a href='logouttest.php'>로그아웃</a></p>";

?>

