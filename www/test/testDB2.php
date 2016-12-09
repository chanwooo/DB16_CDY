<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
</head>
<body>
  <?php
   $host="dream.hust.net";
$port=3306;
$socket="";
$user="root";
$password="root@@";
$dbname="shop";

$connect = mysqli_connect($host,$user,$password,$dbname);
 
if(!$connect) die('Not connected : ' . mysqli_error());
 
mysqli_set_charset($connect,"utf8"); 
$sql = "SELECT * FROM shop.member";
 
$result = mysqli_query($connect,$sql);
 
$row = mysqli_fetch_array($result);
 
echo $row['email']; echo "<br/>";
echo $row['member_name']; echo "<br/>";
echo $row['phoneNo']; echo "<br/>";
echo"<br/>"; 

$row = mysqli_fetch_array($result);

echo $row['email']; echo "<br/>";
echo $row['member_name']; echo "<br/>";
echo $row['phoneNo']; echo "<br/>"; 

mysqli_free_result($result);

mysqli_close($connect);
?>
	
    

</body>

</html>
