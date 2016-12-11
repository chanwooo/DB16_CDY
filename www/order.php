<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
  fieldset{
    margin-bottom:15px;
  }
  ul {
    list-style:none;
  }
  ul li {
    margin-bottom:5px;
  }
  ul li>label {
     width:150px;
     float:left;
  }
</style>
</head>
<body>
  <?php
   include 'header.php'
   ?>
	<h1>주문/결제</h1>
<form action="order2.php" method="get">
<!--
  <fieldset>
    <legend> 주문 상품 확인 </legend>
    <ul>
      <li>
        <label for="itemName">상품 이름</label>
        <input type="text" id="itemName" name="itemName value="readonly">
      </li>
      <li>
        <label for="amount">주문 수량</label>
        <input type="number" id="amount" name="amount" min="1" max="100" step="1" value="1">
      </li>
	  <li>
        <label for="price">결제 금액</label>
        <input type="text" id="price" name="price">
      </li>
    </ul>
  </fieldset>
  -->




<div>
<table border="0">

 <tr>
 <!--<th width="10"><input type="checkbox" onclick="cartchkall();"/></th>-->
 <th width="130">이미지</th>
 <th width="400">상품정보</th>
 <th width="80">가격</th>
 <th width="50">수량</th>
 <th width="70">적립금</th>
 </tr>

 
 <?php
 $member_id=$_SESSION['member_id'];
 if(!isset($_SESSION['member_id'])) {
 echo "not login";
 exit;
 }
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

$mileage= $item[2]*0.01;
$total_item_cost = $total_item_cost+$item[2];
?>

<tr height='140'>
<!--<td align='center'>
<input type='checkbox'name='<?=$item[0]?>'value='itemid'>
</td>-->
<td align='center'>
<img style='float: left' src='img/<?=$item[0]?>.jpg' width='100' height='100'>
</td>
 <td align='center'><?=$item[1]?></td>
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

</table>

  <fieldset>
    <legend> 배송지 정보 입력 </legend>
    <ul>
      <li>
        <label for="name">받으시는 분</label>
        <input type="text" id="name" name="name"size="10">
      </li>
	  <li>
        <label for="address">주소 </label>
        <input type="text" id="address" name="address" size="80">
      </li>
      <li>
        <label for="phoneNo">휴대전화</label>
        <input type="text" id="phoneNo" name="phoneNo" size="20">
      </li>
      <li>
        <label for="inquire">배송시 요구사항</label>
        <input type="text" id="inquire" size="80">
      </li>
    </ul>
  </fieldset>

  <fieldset>
	<legend> 결제 정보 입력</legend>
     <ul>
       <li>
         <label for="howToPay"> 결제 방법 </label>
		 <input type="radio" id="card" name="pay" value="card">신용카드
		 <input type="radio" id="account" name="pay" value="account">무통장입금
		 <input type="radio" id="phone" name="pay" value="phone">휴대폰결제
       </li>
	   
     </ul>
  </fieldset>
  <fieldset style="text-align:center">
      <input type="submit" value="결제하기">
      <input type="reset" value="다시쓰기">
  </fieldset>
</form>
    

</body>

</html>


