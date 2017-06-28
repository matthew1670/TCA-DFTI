<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q11. Complete multiorder.php so that it reads in the device ID and quantity 
// from the form in multiorderform.php. 
$id = $_POST["id"];
$qty = $_POST["qty"];

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tca043", "tca043", "riediabe");

// Q12. In multiorder.php, add the order (containing the quantity, device ID 
// and username) to the sjx_orders table. 
// (this is very similar to question 8)

$uname = $_SESSION["username"]; // Complete to set $uname equal to the logged-in user
$conn->query ("INSERT INTO sjx_orders (username, deviceID, quantity) VALUES('$uname','$id',$qty)"); // complete to do the INSERT statement
echo "Order Placed";


?>

</body>
</html>
