<?php
//create server connection
$con = mysql_connect("localhost","test_3","123");
if(!$con)
{
    die('Could not connect: ' . mysql_error());
}

/* Create products database
if(mysql_query("CREATE DATABASE MAIYIFUDE",$con))
{
    echo "Database created";
}

else
{
    echo "Error creating database: " . mysql_error();
} */

mysql_select_db("MAIYIFUDE",$con);

$sql = "CREATE TABLE products
(
    id int(4) NOT NULL AUTO_INCREMENT,
    name varchar(200),
    code varchar(200),
    price double(7,2),
    quantity int(10),
    category varchar(20),
    image text,
    primary key (id),
    unique(code)
)";

mysql_query($sql,$con);

mysql_close();
?>