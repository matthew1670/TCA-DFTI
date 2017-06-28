<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q7. Prevent people being able to access deviceorder.php without logging in.
if (!isset($_SESSION["username"])){
    header("Location: login.html");
}
// Q6. Complete the statement to read the ID from the query string into $id.
$id = $_GET["id"];

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tca043", "tca043", "riediabe");

// Q8. Add the order to the database.
// Firstly, set $uname equal to the currently logged-in user
$uname = $_SESSION["username"];

// Then, complete the SQL INSERT statement to add the username and device ID to
// the sjx_orders table.
// Set the quantity to 1 for the moment.
$conn->query ("INSERT INTO sjx_orders (username, deviceID, quantity) VALUES('$uname','$id',1)");

echo "Ordered the device with ID $id<br />";

?>

</body>
</html>
