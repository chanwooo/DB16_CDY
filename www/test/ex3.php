<?php

$connect = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");

$query = "select * from cart";
$result = mysqli_query($connect,$query);

while ($row = mysqli_fetch_array($result)){

    echo "row<br>";
    print_r($row);
    echo "<br><br>";
//itemsize_id = 1 인 item의 이름과 가격을 가져오기

    $query="select * from item where item_id = (select item_id from size where itemsize_id = $row[1])";
    $row2=mysqli_query($connect,$query);

    $item_name =mysqli_fetch_array($row2);
    print_r($item_name);
    echo "<br><br>";


    $mileage= $item_name[2]*0.01;
    ?>
<br><br>
    <?=$item_name[0];?> /*item_id*/<br>
    <?=$item_name[1];?> /*item_name*/<br>
    <?=$item_name[2];?> /*item_cost*/<br>
    <?=$row[1];?>       /*amout*/<br>
    <?=$mileage;?>         /*cost*0.01*/<br>
    </tr>

    <?php
}
?>
