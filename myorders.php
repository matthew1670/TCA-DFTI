<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php


// Q17. 
// (only do when you've done EVERYTHING ELSE!!!!)
// Modify the myorders.php script to show the total price of all devices 
// ordered by the user, and add a 
// "Checkout" link, which, when clicked, calls another script which clears the 
// user's orders (which you should write).



// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tca043", "tca043", "riediabe");

//Q13. Complete the myorders.php script. This script should show all orders 
// made by the user (device, username, quantity). The script 
//should show the device name, type and price of each item in the order, not 
// just the item ID. Use EITHER two separate SQL SELECT 
//statements (as hinted at in the code) OR a table join for this – your choice.
$uname = $_SESSION["username"]; 
// Complete this to find all entries in the sjx_orders table for the current user
$query = "SELECT * FROM sjx_orders where username = '$uname'";
$result = $conn->query($query);
$total = 0;
while($row = $result->fetch())
{
     // Now do a second select statement to query the sjx_devices table for 
     // all details about the current device from the sjx_orders table.
     $result2 = $conn->query("SELECT * FROM sjx_devices WHERE ID =" . $row["deviceID"]);
     // Fetch the row from $result2
     $row2 = $result2->fetch();

    // Display the quantity from the first query 
    // and the device details from the second
	echo "Device Name:" . $row2["name"] . "<br/>";
	echo "Device type:" . $row2["type"] . "<br/>";
	echo "Device price:" . $row2["price"] . "<br/>";
	echo "quantity Ordered:" . $row["quantity"] . "<br/><br/><br/>";
	$total = $total + $row2["price"];
}

echo "<h3> Total Price Of All Orders: $total</h3>";
echo "<a href='checkout.php'>Checkout</a>"
?>

</body>
</html>
