<?php

$connect = mysqli_connect("127.0.0.1", "root", "root@@", "shop");
mysqli_set_charset($connect,"utf8");

session_start();

if(isset($_SESSION['member_id'])) {
    $member_id = $_SESSION['member_id'];
}

?>

<header>
    <a href="/cdy/"><h1>DB16_CDY_SHOP</h1></a>

    <div>
        <nav id="topMenu">
            <ul>
                <?php
                if(isset($_SESSION['member_id']))
                {?>

                    <li><a class="menuLink" href="logout.php" style="width:600px">LOGOUT</a></li>


                    <?php
                }
                else
                {?>
                    <li><a class="menuLink" href="login.php">LOGIN</a></li>
                    <li><a class="menuLink" href="join.php">JOIN</a></li>
                <?php
                }
                ?>


                <li><a class="menuLink" href="cart.php">CART()</a></li>
                <li><a class="menuLink" href="mypage.php">MY PAGE</a></li>
               <!-- <li><a class="menuLink" href="info.php">INFO</a></li>-->
            </ul>
        </nav>
    </div>
</header>
