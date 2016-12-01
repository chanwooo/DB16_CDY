<?php
/**
 * Created by PhpStorm.
 * User: chanwoo
 * Date: 2016. 11. 30.
 * Time: 오전 3:19
 */
require_once 'db_connect.php';
$result=mysqli_query($db,'select * from member');
print_r($result);

$row=mysqli_fetch_row($result);
echo "<br>";
print_r($row);

?>