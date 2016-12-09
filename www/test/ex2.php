<?php

////header.php
$connect = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");
////header.php


//$query = "select * from member";
//$result = mysqli_query($connect,$query);
//
//$row = mysqli_fetch_row($result);
//
//echo '$row : ';
//print_r($row);
//echo '<br>';

echo $_GET['name'];

$query = "SELECT * FROM item";
$result = mysqli_query($connect,$query);


while ($row = mysqli_fetch_row($result)) {
    print_r($row);
    echo $row[item_name];
}

mysqli_close($connect);


?>