<?php
    session_start();
    include("dbconnect.php");

    // username and password sent from form login.html
    $name = $_POST["name"];
    $password= $_POST["password"];

    $sql="SELECT * FROM Account WHERE username='$name' and password='$password'";

    $result=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($result); //fetch record row
    $user_name=$rows['Username'];
    $user_id=$rows['Password'];

    // mysql_num_row is counting table row
    $count=mysqli_num_rows($result);

    // If result matched $username and $password, table row must be 1 row
    if($count==1){

        $_SESSION["Login"] = "YES";
        
        echo '<script>alert("Login Successful!");window.location.href="index.php";</script>';
        //header("Location: index.php");

        // Add user information to the session (global session variables)
        $_SESSION['USER'] = $user_name;
        $_SESSION['ID'] = $user_id;
    }

    //if wrong username and password
    else {

        $_SESSION["Login"] = "NO";
        
        echo '<script>alert("Login is unsuccessful!");window.location.href="login.html";</script>';
        //header("Location: login.html");
    }
?>
		 
	  

 
