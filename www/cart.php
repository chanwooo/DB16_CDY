<!DOCTYPE html>
<html lang="ko-KR">
<head>
    <meta charset="utf-8"/>

 <link rel="stylesheet" type="text/css" href="css/style.css"/>

 <title>장바구니</title>

</head>
<body>

<?php include 'header.php';
?>

<section>

<?php

if(!isset($_SESSION['member_id'])) {
 echo "not login";
 exit;
}

?>

<div>
<form method="get" name="Form">
<table border="0">
 <caption> CART </caption>
 <tr>
 <th width="10"><!--<input type="checkbox"/>--></th>
 <th width="130">이미지</th>
 <th width="400">상품정보</th>
 <th width="80">가격</th>
 <th width="50">수량</th>
 <th width="70">적립금</th>
 </tr>

 
 <?php
 $member_id=$_SESSION['member_id'];
$query = "select * from cart where member_id=$member_id";
$result = mysqli_query($connect,$query);



 $count=mysqli_num_rows($result);
 if($count==0) {
  echo "<tr><td colspan='6'>주문한 상품이 없습니다.</td></tr></table>";
  exit;
 }

 while ($row = mysqli_fetch_array($result)){
 	$query1="select * from item where item_id = (select item_id from size where itemsize_id = $row[1])";
    $row2=mysqli_query($connect,$query1);

    $item =mysqli_fetch_array($row2);

    $query2="select * from size where itemsize_id = $row[1]";
    $row3=mysqli_query($connect,$query2);

    $size=mysqli_fetch_array($row3);

$mileage= $item[2]*0.01;
$total_item_cost = $total_item_cost+$item[2];
$itemsize_id=$size[0];
?>

<tr height='140'>
<td align='center'>
<input type='checkbox' name = 'cart[]' value='<?=$itemsize_id?>'>
</td>
<td align='center'>
<img style='float: left' src='img/<?=$item[0]?>.jpg' width='100' height='100'>
</td>
 <td align='center'><?=$item[1]?>(<?=$size[3]?>)</td>
 <td align='center'><?=$item[2]?></td>
 <td align='center'><?=$row[2]?></td>
 <td align='center'><?=$mileage?></td>
</tr>

<?php

}

?>

</table>
<br><br>
<table border="0" width="790" height="100">
 <tr>
 <td align="center">총 상품금액</td>
 <td align="center">배송비</td>
 <td align="center">결제예정금액</td>
 </tr>

 <tr>
 <th><?=$total_item_cost?></th>
 <th>2000</th>
 <th><?=$total_item_cost+2000?></th>
 </tr>

</table>
<br><br><br>
<input type="submit" value="주문하기" onclick='Submit(1)'>
<input type="submit" value="취소하기" onclick='Submit(2)'>
</from>
</div>
</section>
</body>

</html>
<script type="text/javascript">

  function Submit(index) {

    if (index == 1) {

      document.Form.action='order.php';

    }

    if (index == 2) {

      document.Form.action='deletecart.php';

    }

    document.Form.submit();

  }

</script>
