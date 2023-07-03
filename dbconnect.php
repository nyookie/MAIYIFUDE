<?php
//connect to MySQL Server from PHP
$con = new mysqli("localhost", "test_2", "123");

//sql to create database
$createdb = "CREATE DATABASE MAIYIFUDE";

//perform the createdb query
$con->query($createdb);

//connection to the database
$conn = mysqli_connect("localhost", "test_2", "123", "MAIYIFUDE");

//If login failed, terminate the page (using function 'die')
if(!$conn) die("Error when connecting to MySQL: ". mysqli_error());

//Create products table
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

mysqli_query($conn,$sql);

//Insert products
$sql2 = "INSERT INTO products(id, name, code, image, price, quantity, category) VALUES('1', 'Preloved Sweater', 'MY01','img/hoody.jpg',20.00,2,'top'),
('2', 'Preloved White Top', 'MY02','img/p.jpg',25.00,3,'top'),
('3', 'Preloved Line Style Top', 'MY03','img/12352746717214.jpg',10.00,2,'top'),
('4', 'Preloved Sports Trousers', 'MB01','img/p9.jpg',20.00,2,'bottom'),
('5', 'Preloved Uniqlo Jeans', 'MB02','img/p8.jpg',38.00,2,'bottom'),
('6', 'Preloved Plaid Suit Pants', 'MB03','img/p6.jpg',35.00,3,'bottom'),
('7', 'Preloved Denim Jacket', 'MY04','img/j.jpg',30.00,2,'top'),
('8', 'Preloved Adidas T-shirt', 'MY05','img/adidas.jpg',10.00,4,'top'),
('9', 'Preloved Fila Purple Top', 'MY06','img/purple.jpeg',15.00,2,'top'),
('10', 'Preloved Beige Straight Long Pants', 'MB04','img/p7.webp',15.00,2,'bottom'),
('11', 'Preloved Black Suit Pants', 'MB05','img/p3.jpeg',30.00,2,'bottom'),
('12', 'Preloved Zalora Wide Legged Culottes Pants', 'MB06','img/p10.jpg',35.00,2,'bottom')";

mysqli_query($conn,$sql2);

//Create table to store payment details
$sql3 = "CREATE TABLE payment_details
(
    fullname varchar(100),
    phoneNumber varchar(17),
    states varchar(100),
    postcode varchar(6),
    street varchar(100),
    method varchar(100)
)";

mysqli_query($conn,$sql3);

//Create table sccount to store user account details
$sql4 = "CREATE TABLE Account
(
    UserID int(4) NOT NULL AUTO_INCREMENT,
    Username varchar(20),
    Email varchar(20),
    PhoneNo varchar(20),
    Password varchar(20),
    primary key(UserID)
)";

mysqli_query($conn,$sql4);
?>


