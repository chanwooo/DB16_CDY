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
include 'header.php'
?>

<section>
			<ul class='showitem'>

				<?php
				for ($i=0; $i<10; $i++) {

					echo "
					<li id = '#' class='#' >
					<div class='box' >
						<a href = 'detail.php' >
							<img src = 'img/0001.jpg' />
						</a>
							<p><strong style = 'color: #555555;' > 제품명</strong ></p >
							<p style = 'color: #555555;' > 50,000원 </p >

					</div >
				</li >
					";
					if($i%3==0)
						echo"<br>";
				}
					?>

			</ul>

</section>


<? include 'footer.html'?>

</body>

</html>
