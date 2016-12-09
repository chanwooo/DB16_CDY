<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
.ct-btn.large {
	width: 600px;
	height: 46px;
	padding: 0 1em;
	font-size: 18px;
	font-weight: 600;
	line-height: 46px;
}

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
	<h1>회원가입</h1>
<form method="post" action="join2.php">
	<fieldset>
		<ul>
		  <li>
			<label for="itemName">아이디(이메일)</label>
			<input type="text" id="userID" size="20" name="email">
		  </li>
		  <li>
			<label for="amount">비밀번호</label>
			<input type="password" id="userPassword" size="20" name="password">
		  </li>
		  <li>
			<label for="price">비밀번호 재확인</label>
			<input type="password" id="userPasswordRe" size="20" name="password2">
		  </li>
		</ul>
	  </fieldset>
	  <fieldset>
		<ul>
		  <li>
			<label for="itemName">이름</label>
			<input type="text" id="userName" size="10" name="member_name">
		  </li>
		  <li>
			<label for="amount">휴대폰번호</label>
			<input type="number" id="userPhoneNum" size="30" name="phoneNo">
		  </li>
		  <li>
			<label for="amount">주소</label>
			<input type="text" id="userAddress" size="80" name="address">
		  </li>
		</ul>
	  </fieldset>
	  <center>
      <input type="submit" class="ct-btn white large" value="가입하기">
      </center>
	</fieldset>
</form>
    

</body>

</html>