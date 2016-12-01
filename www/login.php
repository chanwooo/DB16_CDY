<!DOCTYPE html>
<html lang="ko-KR">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="CHANWOO" />
    <meta name="author" content="chanwookim@me.com" />
    <title>chanwoo</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>
<body>

<?php
include 'header.php';
include "db_connect.php";
$name = $_POST['id'];
$pw = $_POST['password']; # comment
$query = "select * from users WHERE username = '$name' AND password = '$pw'";
$result = mysqli_query($db, $query);


if ($row = mysqli_fetch_array($result))
{
    print_r($result);


    echo "<p>Thanks for logging in, $name</p>\n";
    echo "<p><a href=\"search.php\">Continue</a></p>";
}
else
{
    print_r($result);

    echo "<p>Incorrect username or password</p>\n";
    echo  "<h1>Log In</h1>\n  <form method=\"post\" action=\"login.php\">";
    echo "<label for=\"username\">Username:</label><input type=\"text\" id=\"id\" name=\"id\" /><br />";
    echo "<label for=\"pw\">Password:</label><input type=\"password\" id=\"pw\" name=\"pw\" /><br />";
    echo "<input type=\"submit\" value=\"Login\" name=\"submit\" /></form> <p><a href=\"createAccount.php\">Create Account</a></p>";
}


?>


<div>
    <form method="POST" action="login.php" >
        <ul  style="float: right"; position="relative">
            <li style="float:left";><input type="text" name="id" placeholder="id"/></li>
            <li style="float:left";><input type="password" name="password" placeholder="password"/></li>
            <li style="float:left";><input type="submit" value="login"/></li>
        </ul>
    </form>
</div>

</body>

</html>







