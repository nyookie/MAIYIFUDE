<?php 
session_start();
include("dbconnect.php");
$cart_count = 0;
if(isset($_POST['code']) && $_POST['code'] != "")
{
    $code = $_POST['code'];
    $result = mysqli_query($conn,"SELECT * FROM products WHERE code = '$code'");
    
    $row = mysqli_fetch_assoc($result);
    $name = $row['name'];
    $code = $row['code'];
    $price = $row['price'];
    $image = $row['image'];
    
    $cartArray = array($code=>array('name'=>$name,'code'=>$code,'price'=>$price,'quantity'=>1,'image'=>$image));
    
    if(empty($_SESSION["shopping_cart"]))
    {
        $_SESSION["shopping_cart"] = $cartArray;
        echo '<script>alert("Item is added to your cart!")</script>';
    }
    else
    {
        $array_keys = array_keys($_SESSION["shopping_cart"]);
        if(in_array($code,$array_keys))
        {
            echo '<script>alert("Item is already in your cart!")</script>';
        }
        else
        {
            $_SESSION["shopping_cart"] = array_merge($_SESSION["shopping_cart"],$cartArray);
            echo '<script>alert("Item is added to your cart!")</script>';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset='UTF-8'/>
        <title>MAIYIFUDE</title>
        <link rel='stylesheet' href='styles.css' media='all'/>
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
            <div class='logo'><img src='img/logo.png'></div>
        </div>
        
        <div class='category-container'>
            <div class='category'>
                <div class='all-product'><a href="index.php" class='ap'>All Product</a></div>
                <div class='top'><a href="top.php" class='to'>Top</a></div>
                <div class='bottom'><a href="bottom.php" class='bo'>Bottom</a></div>
            </div>
        </div>
        
        <div class='product-container'>
            <div class='product'>
                <?php
                
                $sql = "SELECT * FROM products";
                $result2 = mysqli_query($conn,$sql);
                
                while($row2 = mysqli_fetch_assoc($result2))
                {
                    echo "<div class='product-item'>
                    <form method='post' action=''>
                    <input type='hidden' name='code' value=".$row2['code']." />
                    <div class='image'><img src='".$row2['image']."' class='product-image'/></div>
                    <div class='name'>".$row2['name']."</div>
                    <div class='price'>RM".$row2['price']."</div>
                    <input type='submit' value = 'Add To Cart' class='add-cart'/>
                    </form>
                    </div>";
                }
        mysqli_close($conn);
                ?>
                
            </div>
        </div>
        
        <div class='footer'>
            <div class='footer-item'><span>&copy</span>2021 MAIYIFUDE. All rights reserved.</div>
        </div>
    </body>