<html>
    <head>
        <meta charset='UTF-8'/>
        <title>MAIYIFUDE</title>
        <link rel='stylesheet' href='styles.css'/>
    </head>
    <?php
    error_reporting(0);
    session_start();
    $cart_count = 0;
    include("dbconnect.php");
    ?>
    
    <body>
        <div class='menu-container'>
            <div class='menu'>
                <div class='login'><a href="login.html"><img src="img/login.png" alt="login"></a></div>
                <div class='signup'><a href="signup.html"><img src="img/signup.png" alt="signup"></a></div>
                <div class="search">
                    <form action="search.php" method="GET">
                        <input type="search" placeholder="Search" name="query" />
                    </form>
                </div>
            </div>
                <div class='links'>
                    <div class='cart'><a href="cart.php"><img src="img/mycart.png" alt="cart"></a></div>
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
        <div class="flex-container">
            <div>
                <form name="customer1" method="post" action="paymentdone.php">
                    <h2><b>Delivery Address</b></h2><br>
                    <table class="delivery-details">
                        <tbody>
                            <tr>
                                <td><input type="text" class="delivery-fields" id="fullname" name="fullname" placeholder="Enter your full name" required></td>    
                                <td><input type="tel" class="delivery-fields" id="phoneNumber" name="phoneNumber" pattern="[0-9]{3}-[0-9]{7,8}" placeholder="Contact Number" required></td>
                            </tr>
                            <tr>
                                <td><select name="states" class="delivery-details" id="states" required>
                                    <option value="" disabled selected>--Choose your state--</option>
                                    <option value="Johor">Johor</option>
                                    <option value="Kedah">Kedah</option>
                                    <option value="Kelantan">Kelantan</option>
                                    <option value="Kuala Lumpur">Kuala Lumpur</option>
                                    <option value="Labuan">Labuan</option>
                                    <option value="Melaka">Melaka</option>
                                    <option value="Negeri Sembilan">Negeri Sembilan</option>
                                    <option value="Pahang">Pahang</option>
                                    <option value="Penang">Penang</option>
                                    <option value="Perak">Perak</option>
                                    <option value="Perlis">Perlis</option>
                                    <option value="Putrajaya">Putrajaya</option>
                                    <option value="Sabah">Sabah</option>
                                    <option value="Sarawak">Sarawak</option>
                                    <option value="Selangor">Selangor</option>
                                    <option value="Terengganu">Terengganu</option>
                                </select></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="delivery-fields" id="postcode" name="postcode" placeholder="Postcode" maxlength="5" required></td>
                            </tr>
                            <tr>
                                <td><input type="text" class="delivery-fields" id="street" name="street" placeholder="Street Name" required></td>
                            </tr>
                            <tr>
                                <br>
                                <td><b>Payment method:</b></td>
                                <td><input type="radio" id="method" name="method" value="Online Banking">&nbsp Online Banking</td>
                                <td><input type="radio" id="method" name="method" value="Cash On Delivery" checked>&nbsp Cash On Delivery</td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Save" class="buy"></td>
                            </tr>
                        </tbody>
                        </table>
                </form>
            </div>
           <?php
            if(isset($_SESSION["shopping_cart"])){
                $total_price = 0;
            ?>
            <div>
                <h2><b>Check Your Order:</b></h2><br>
            <table class="table">
                <tbody>
                    <tr>
                        <td></td>
                        <td>Item Name</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Item Total</td>
                    </tr>	
                    <?php
                    foreach ($_SESSION["shopping_cart"] as $product)
                    {
                    ?>
                        <tr>
                            <td>
                                <img src='<?php echo $product["image"]; ?>' width="150" height="150" /></td>
                            <td><?php echo $product["name"]; ?></td>
                            <td>
                            <form method='post' action=''>
                                <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                                <input type='hidden' name='action' value="change" />
                                <input type="text" name='quantity' size="5" class='quantity' value="<?php echo $product['quantity']; ?>"; />
                            </form>
                            </td>
                            <td><?php echo "RM".$product["price"]; ?></td>
                            <td><?php echo "RM".$product["price"]*$product["quantity"]; ?></td>
                        </tr>
                        <?php
                        $total_price += ($product["price"]*$product["quantity"]);
                        }
                        ?>
                    <tr>
                        <td colspan="6" align="right">
                            <strong>TOTAL: <?php echo "RM".$total_price; ?></strong>
                        </td>
                    </tr>
                </tbody>
                </table>
                <br>
                <?php
                }
                else
                {
                    echo "<div id='cart'>";
                    echo "<div id='cart-item'>";
                    echo "<h5>Your cart is empty!</h5><br><br><br>";
                    echo "<a href='index.php' class='continue'>Continue Shopping</a>";
                    echo "</div></div>";
                }
                ?>
                </div>
            </div>
            <div class='footer'>
                <div class='footer-item'><span>&copy</span>2021 MAIYIFUDE. All rights reserved.</div>
            </div>
        
    </body>
</html>