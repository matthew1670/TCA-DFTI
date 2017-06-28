<?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q2. Read in the type and maximum price from the form into the variables 
// $typ and $mxp
$typ = $_GET["device_type"];
$mxp = $_GET["device_price"];

// Replace with your login details
$conn = new PDO ("mysql:host=localhost;dbname=tca043", "tca043", "riediabe");

// Q3. Complete the statement to find all devices of the user's chosen type with a price
// less than or equal to the user's chosen maximum price
$result = $conn->query("SELECT * FROM sjx_devices WHERE type = '$typ' AND price <= $mxp");


// While loop to display each matching device
while($row = $result->fetch())
{
    // Q4. Add code to the while loop to display the details 
    // (name, type, Android version, price) of each matching device.
	echo "Name: " . $row["name"] . "<br/>";
	echo "Type: " . $row["type"] . "<br/>";
	echo "Version: " . $row["version"] . "<br/>";
	echo "Price: " . $row["price"] . "<br/>";


    // Q5. Add a hyperlink to "deviceorder.php". This should include an 
    // appropriate query string containing the device ID. 
	echo "<a href='deviceorder.php?id=".$row["ID"]."'>Order Device</a><br/>";
    // Q9. (first part) Add a hyperlink to "multiorderform.php"
    // This should include an appropriate query string containing the device ID.
	echo "<a href='multiorderform.php?id=".$row["ID"]."'>MultiOrder</a><br/>";

    // Q14. On devicesearch.php, add an "Alter Device Details" link, to 
    // alterdetailsform.php. 
    // This should again contain a query string containing the device ID. 
    // This should only be displayed if the user is logged in as an administrator.
	if (isset($_SESSION["adminstatus"]) && $_SESSION["adminstatus"] == 1){
		echo "<a href='alterdetailsform.php?id=".$row["ID"]."'>Alter Device Details</a><br/>";
	}

}

?>

</body>
</html>
