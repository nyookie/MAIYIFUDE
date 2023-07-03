<?php
include("dbconnect.php");
$sql="INSERT INTO payment_details (fullname, phoneNumber, states, postcode, street, method) VALUES('$_POST[fullname]', '$_POST[phoneNumber]', '$_POST[states]', '$_POST[postcode]', '$_POST[street]', '$_POST[method]')";
mysqli_query($conn,$sql);
?>
<html>
    <head>
        <meta charset='UTF-8'/>
        <title>MAIYIFUDE</title>
        <link rel='stylesheet' href='styles.css'/>
    </head>
    
    <body>
        <div class='menu-container'>
            <div class='menu'>
                <div class='login'><a href="logi.html"><img src="img/login.png" alt="login"></a></div>
                <div class='signup'><a href="signup.html"><img src="img/signup.png" alt="signup"></a></div>
                <div class="search">
                    <form action="search.php" method="GET">
                        <input type="search" placeholder="Search" name="query" />
                    </form>
                </div>
            </div>
                <div class='links'>
                <?php
                if(!empty($_SESSION["shopping_cart"]))
                {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                }
                ?>
                    <div class='cart'><a href="cart.php"><img src="img/mycart.png" alt="cart"></span></a></div>
                </div>
        </div>
        
        <div class='logo-container'>
            <div class='logo'><a href="index.php"><img src='img/banner.png'></a></div>
        </div>
        
        <div class='category-container'>
            <div class='category'>
                <div class='all-product'><a href="index.php" class='ap'>All Product</a></div>
                <div class='top'><a href="top.php" class='to'>Top</a></div>
                <div class='bottom'><a href="bottom.php" class='bo'>Bottom</a></div>
            </div>
        </div>
        
        <div class="cart">
            <div class="parcel"><img src="img/delivery.gif" alt="parcel on the way"></div>
            <br>
            <h1><strong>Your Parcel Will Be Sent Out Very Soon!</strong></h1>
            <br>
            <div class="payment-continue">
            <a href="index.php" class="continue">Continue your shopping</a></div>
        </div>
        
        <div class='footer'>
            <div class='footer-item'><span>&copy</span>2021 MAIYIFUDE. All rights reserved.</div>
        </div>
    </body>
</html>