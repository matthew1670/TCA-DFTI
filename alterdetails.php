<?php
session_start();
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

//Q16. Complete alterdetails.php to actually change the device's details in the database, by reading in the
// data from the form in alterdetailsform.php.
// Again, this script must be accessible to administrators only.
	if ($_SESSION["adminstatus"] != 1){
		header("Location: index.html");
	}
	
$id = $_POST["id"];
$price = $_POST["price"];
$ver = $_POST["ver"];
$conn = new PDO ("mysql:host=localhost;dbname=tca043", "tca043", "riediabe");
$query="UPDATE sjx_devices SET price=$price, version=$ver WHERE ID=$id";
$conn->query($query);
echo "Done";


?>

</body>
</html>
