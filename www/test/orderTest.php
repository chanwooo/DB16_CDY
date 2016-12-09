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
   include '../header.php'
   ?>
	<h1>주문/결제</h1>
<form action="inputTest3.php" method="get">
  <fieldset>
    <legend> 주문 상품 확인 </legend>
    <ul>
      <li>
        <label for="itemName">상품 이름</label>
        <input type="text" id="itemName" name="itemName">
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


