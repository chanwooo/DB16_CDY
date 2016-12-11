<!DOCTYPE html>
<html lang="ko-KR" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8"/>


    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <title>제품상세</title>
</head>

<body>



<?php include 'header.php'; ?>
<section>
 <!--   //echo $item_id;
/*
    $query = 'SELECT * FROM item where item_id = $item_id';
    $result = mysqli_query($connect,$query);
    print_r($result);

*/
    //mysqli_close($connect);

-->
<?php
$item_id=$_GET['item_id'];

$query1 = "select * from item where item_id = $item_id";
$resultquery = mysqli_query($connect,$query1);

$result = mysqli_fetch_array($resultquery);
$mileage= $result[2]*0.01;


$vendor = "select * from vendor where vendor_id = (select vendor_id from vendor_item where item_id=$item_id) ";
$vendorquery = mysqli_query($connect,$vendor);

$vendor_name=mysqli_fetch_array($vendorquery);

$size_query="select * from size where item_id=$item_id";
$size=mysqli_query($connect,$size_query);

?>


 

<img style='float: left' src='img/<?=$item_id?>.jpg' width='300' height='300'>
<div>

    <h3><?=$result[1]?></h3>
    <table border='0'>
        <tr>
            <td>가격</td>
            <td><?=$result[2]?></td>
        </tr>
        <tr>
            <td>적립금(1%)</td>
            <td><?=$mileage?></td>
        </tr>
        <tr>
            <td>제조사</td>
            <td><?=$vendor_name[2]?></td>
        </tr>
    </table><br>

    <form method="_GET" name="Form">

    사이즈선택<br>
    
    
        <select name='size' required>
            <option value='0' selected disabled>선택하세요</option>
            <?php
            while($row = mysqli_fetch_array($size)){
            ?>
            <option value='<?=$row[0]?>'><?=$row[2]?>(<?=$row[3]?>)</option>
           <?php
            }
            ?> 
        </select>

        
    
        <br><br>
        수량<br>
        <input type='number' min='1' max='10' step='1' value='1' name='amount'><br><br>
        
        <input type='submit' value='ADD TO CART' onclick='Submit(1)'><input type='submit' value=' BUY IT NOW ' onclick='Submit(2)'><br><br><br><br>
    </form>
</div>

</section>
</body>

</html>
<script type="text/javascript">

  function Submit(index) {

    if (index == 1) {

      document.Form.action='addcart.php';

    }

    if (index == 2) {

      document.Form.action='ordernow.php';

    }

    document.Form.submit();

  }

</script>

