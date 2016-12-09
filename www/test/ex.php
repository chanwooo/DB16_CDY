<?php 


$connect=mysql_connect("dream.hust.net","root","root@@") or die("½ÇÆÐ");
mysql_select_db("shop",$connect);

mysql_query('set names utf8');

$result = mysql_query("SELECT * FROM member");

$n=3;
    echo $n+7;

    while ($row = mysql_fetch_array($result)){
        //print_r($row);
    	echo "
    	<tr>
    	<td>$row[0]</td>
    	<td>$row[1]</td>
    	<td>$row[2]</td>
    	<td>$row[3]</td>
    	<td>$row[4]</td>
    	<td>$row[password]</td>
    	<td>$row[address]</td>
    	";
    }

    mysql_close();

?>