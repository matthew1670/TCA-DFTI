<?php
session_start();
?>
<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

//Q15. Complete alterdetailsform.php so that it shows a form allowing the administrator to alter the details
// of a device (price, Android version). The current device details must be included in the form. 
// This script must be accessible to administrators only.
	if ($_SESSION["adminstatus"] != 1){
		header("Location: index.html");
	}
$id = $_GET["id"];
$conn = new PDO ("mysql:host=localhost;dbname=tca043", "tca043", "riediabe");
$query = "SELECT * FROM sjx_devices WHERE ID = $id";
$result = $conn->query($query);
$row = $result->fetch();
echo 
"<form method='post' action='alterdetails.php'>
Price: <input type='text' placeholder='Price' name='price' value='". $row['price'] ."'></br>
Ver: <input type='text' placeholder='android Version' name='ver' value='". $row['version'] ."'></br>
<input type='hidden' name='id' value='". $row["ID"] ."'/>
<input type='submit'>
</form>";



?>

</body>
</html>
