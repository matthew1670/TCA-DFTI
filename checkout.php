 <?php
session_start();
?>

<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php
$conn = new PDO ("mysql:host=localhost;dbname=tca043", "tca043", "riediabe");
$uname = $_SESSION["username"]; 
$query = "DELETE FROM sjx_orders where username = '$uname'";
echo $query;
if ($result = $conn->query($query)){
header("Location: myorders.php");
}
?>

</body>
</html>
