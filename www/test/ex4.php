<?php
$connect = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");

$date=date("Ymd");
$query3 = "INSERT INTO orderlist (itemsize_id, member_id , name, order_date, how_to_pay, address, phoneno, amount, memo) 
VALUES ('1', '1', 'name', $date, 'pay', 'addr', '01099097009', '1', '주의')";

mysqli_query($connect,$query3);//insert orderlist




?>

