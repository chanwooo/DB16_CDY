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

if(!isset($_SESSION['member_id'])) {
    echo "not login";
    exit;
}



    echo "<p>안녕하세요. $member_id 님</p>";
    echo "<p><a href='logout.php'>로그아웃</a></p>";

?>


mypage
</body>
