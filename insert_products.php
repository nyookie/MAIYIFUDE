<?php
require_once("dbconnect.php");

/* $sql = "INSERT INTO products(id, name, code, image, price, quantity, category) VALUES('1', 'Preloved Sweater', 'MY01','img/hoody.jpg',20.00,2,'top'),
('2', 'Preloved White Top', 'MY02','img/p.jpg',25.00,3,'top'),
('3', 'Preloved Line Style Top', 'MY03','img/12352746717214.jpg',10.00,2,'top'),
('4', 'Preloved Sports Trousers', 'MB01','img/p9.jpg',20.00,2,'bottom'),
('5', 'Preloved Uniqlo Jeans', 'MB02','img/p8.jpg',38.00,2,'bottom'),
('6', 'Preloved Plaid Suit Pants', 'MB03','img/p6.jpg',35.00,3,'bottom'),
('7', 'Preloved Denim Jacket', 'MY04','img/j.jpg',30.00,2,'top'),
('8', 'Preloved Adidas T-shirt', 'MY05','img/adidas.jpg',10.00,4,'top'),
('9', 'Preloved Fila Purple Top', 'MY06','img/8115403d9259487e296bbd7a69500ae61652f73deded46950a50dbf0156568dc.jpg',15.00,2,'top'),
('10', 'Preloved Beige Straight Long Pants', 'MB04','img/p7.webp',15.00,2,'bottom'),
('11', 'Preloved Black Suit Pants', 'MB05','img/p3.jpeg',30.00,2,'bottom'),
('12', 'Preloved Zalora Wide Legged Culottes Pants', 'MB06','img/p10.jpg',35.00,2,'bottom')"; */
       
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('1', 'Preloved Sweater', 'MY01','img/hoody.jpg',20.00,2,'top')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('2', 'Preloved White Top', 'MY02','img/p.jpg',25.00,3,'top')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('3', 'Preloved Line Style Top', 'MY03','img/12352746717214.jpg',10.00,2,'top')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('4', 'Preloved Sports Trousers', 'MB01','img/p9.jpg',20.00,2,'bottom')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('5', 'Preloved Uniqlo Jeans', 'MB02','img/p8.jpg',38.00,2,'bottom')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('6', 'Preloved Plaid Suit Pants', 'MB03','img/p6.jpg',35.00,3,'bottom')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('7', 'Preloved Denim Jacket', 'MY04','img/j.jpg',30.00,2,'top')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('8', 'Preloved Adidas T-shirt', 'MY05','img/adidas.jpg',10.00,4,'top')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('9', 'Preloved Fila Purple Top', 'MY06','img/purple.jpeg',15.00,2,'top')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('10', 'Preloved Beige Straight Long Pants', 'MB04','img/p7.webp',15.00,2,'bottom')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('11', 'Preloved Black Suit Pants', 'MB05','img/p3.jpeg',30.00,2,'bottom')");
mysql_query("INSERT INTO products(id, name, code, image, price, quantity, category) VALUES ('12', 'Preloved Zalora Wide Legged Culottes Pants', 'MB06','img/p10.jpg',35.00,2,'bottom')");
            

mysql_close($conn);
?>