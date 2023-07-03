<?php
include("dbconnect.php");
$errors = array();
    
$var1 = "/^[0-9a-zA-z]+$/"; //alphanumeric
$var2 = "/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/"; //email
$var3 = "/^(01)[0-46-9]*[0-9]{7,8}$/"; //phone
    
$name = $_POST["name"];
$email= $_POST["email"];
$phone= $_POST["phone"];
$password= $_POST["password"];
$repassword=$_POST["repassword"];

if(strlen($name)>=6 && strlen($name)<=8)
{
    if(!preg_match($var1,$name))
    {
        $errors['username'] = "wrong";
        echo "Try again with 6-8 alphanumeric name. <br>";
    }
}
else
{
   $errors['username'] = "wrong";
     echo "Try again with 6-8 alphanumeric name. <br>"; 
}
     

if(!preg_match($var2,$email))
{
    $errors['email'] = "wrong";
    echo "Try again with valid email address. <br>";
}
    

if(!preg_match($var3,$phone))
{
   $errors['phone'] = "wrong";
    echo"Try again with a valid Malaysia phone number. <br>"; 
}
    

if(strlen($password) >= 6 && strlen($password) <=8)
{
    if(preg_match($var1,$password))
    {
        if($password!=$repassword)
        {
            $errors['password'] = "wrong";
            echo "Password and re-enter password not matched.<br>";
        }
    }
    else
    {
       $errors['password'] = "wrong";
        echo "Try again with 6-8 alphanumeric password. <br>"; 
    }
        
}
else
{
    $errors['password'] = "wrong";
    echo "Try again with 6-8 alphanumeric password. <br>";
}

if(!$errors)
{
    $sql="INSERT INTO Account(Username, Email, phoneNo, Password)
    VALUES ('$name', '$email', '$phone', '$password')";
    mysqli_query($conn,$sql);
    echo '<script>alert("Thanks for signing up! Grab your lovely preloved clothes now! : )");window.location.href="index.php";</script>';
}
else
{
    header("Location: signup.html");
}
?>
