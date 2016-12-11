
<meta charset="utf-8"/>
<?php
$connect = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");
session_start();

$member_id=$_SESSION['member_id'];
$date=date("Ymd");
$name=$_GET['name'];
$pay=$_GET['pay'];
$addr=$_GET['address'];
$phone=$_GET['phoneNo'];
$memo=$_GET['memo'];

$query = "select * from cart where member_id=$member_id"; //로그인된 멤버의 카트 정보
$result = mysqli_query($connect,$query);//row[0]=member_id, row[1]=itemsize_id, row[2]=amount

 while ($row = mysqli_fetch_array($result)){ //cart에 item 수 만큼 반폭
 	$query4="select * from item where item_id = (select item_id from size where itemsize_id = $row[1])";
    $row2=mysqli_query($connect,$query4);

    $item =mysqli_fetch_array($row2);//카트에 있는 아이템 정보 

    $mileage= $mileage+($item[2]*0.01);

    $query6="select * from size where itemsize_id = $row[1]";
    $result2=mysqli_query($connect,$query6);
    $stock=mysqli_fetch_array($result2);//size정보
    $Tstock=$stock[3]-$row[2];
    $query5="update size set item_stock=$Tstock where itemsize_id = $row[1]";
    mysqli_query($connect,$query5);//아이템수량에서 카트아이템수량 빼기

?>

<?php

    // echo "$row[1],<br> $member_id,<br> $name,<br> $date,<br> $pay,<br> $addr,<br> $phone,<br> $row[2],<br> $memo<br>";

     //echo "why?";
     $query_insert="insert into orderlist (itemsize_id, member_id, name, order_date, how_to_pay, address, phoneno, amount, memo)VALUES ('$row[1]', '$member_id', '$name', '$date', '$pay', '$addr', '$phone', '$row[2]', '$memo')";
     mysqli_query($connect,$query_insert);//insert orderlist


}

$query3 = "select * from member where member_id=$member_id";
$result1=mysqli_query($connect,$query3);
$Mmileage=mysqli_fetch_array($result1);
$Tmileage=$mileage+$Mmileage[6];//멤버마일리지+구매마일리지

$query1 = "update member set mileage=$Tmileage where member_id=$member_id";
mysqli_query($connect,$query1);//마일리지업데이트


$query1 = "update item set totalSale_rate = totalSale_rate + 1 where item_id = $item[0]";
mysqli_query($connect,$query1);//판매된 아이템 갯수 증가(totalsale rate)



$query2 = "delete from cart where member_id=$member_id";
mysqli_query($connect,$query2);//카트테이블비우기







?>
<script language=javascript>
 alert('결제되었습니다');
 </script>
 <meta http-equiv='refresh' content='0;url=index.php'>