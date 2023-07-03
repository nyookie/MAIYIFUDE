<?php
error_reporting(0);
session_start();
$cart_count = 0;
include("dbconnect.php");
if (isset($_POST['action']) && $_POST['action']=="remove")
{
    if(!empty($_SESSION["shopping_cart"])) 
    {
        foreach($_SESSION["shopping_cart"] as $key=>$value) 
        {
            if($_POST["code"] == $key)
            {
                unset($_SESSION["shopping_cart"][$key]);
                echo '<script>alert("Item is removed!")</script>';
            }
            if(empty($_SESSION["shopping_cart"]))
            {
                unset($_SESSION["shopping_cart"]);
            }
        }		
    }
}

if (isset($_POST['action']) && $_POST['action']=="change")
{
    foreach($_SESSION["shopping_cart"] as &$value)
    {
        $code = $value['code'];
        $result3 = mysqli_query($conn,"SELECT * FROM products WHERE code='$code'");
        $row3 = mysqli_fetch_assoc($result3);
        $available = $row3['quantity'];
        
        if($value['code'] == $_POST["code"])
        {

            if($_POST["quantity"] > 0)
            {
                if($available >= $_POST["quantity"])
                {
                    $value['quantity'] = $_POST["quantity"];
                    break;
                }
                else
                {
                    echo "<script>alert('There are only $available quantity available for this item! \\n Please enter a valid quantity!')</script>";
                }
            }
            else
            {
                
                echo "<script>alert('There are only $available quantity available for this item! \\n Please enter a valid quantity!')</script>";
            }
        }
    }
}
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
                <div class='login'><a href="login.html"><img src="img/login.png" alt="login"></a></div>
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
                <div class='cart-icon'><a href="cart.php"><img src="img/mycart.png" /><span class="badge"><?php echo $cart_count; ?></span></a>
                </div>
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
            <h2>Cart</h2>
            <?php
            if(isset($_SESSION["shopping_cart"])){
                $total_price = 0;
            ?>	
            <table class="table">
                <tbody>
                    <tr>
                        <td></td>
                        <td>Item Name</td>
                        <td>Quantity</td>
                        <td>Unit Price</td>
                        <td>Item Total</td>
                        <td>Remove</td>
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
                        <td>
                        <form method='post' action=''>
                            <input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
                            <input type='hidden' name='action' value="remove"/>
                            <button type='submit' class="remove"><img src="img/icon-delete.png" alt="remove-item"/></button>
                        </form>
                        </td>
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
                    <tr>
                        <form name="cart1" method="post" action="payment.php">
                        <td colspan="6">
                            <input type="submit" name="buy now" value="Buy Now!" class="buy">
                        </td>
                        </form>s
                    </tr>
                </tbody>
            </table><br><br>		
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
        <div class='footer'>
            <div class='footer-item'><span>&copy</span>2021 MAIYIFUDE. All rights reserved.</div>
        </div>
        </form>
    </body>
</html>