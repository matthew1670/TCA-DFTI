<html>
<head>
<link rel='stylesheet' type='text/css' href='sjx.css' />
</head>
<body>

<?php

// Q9 (second part) 
// Read in the query string from devicesearch.php into $id.

$id = $_GET["id"];

// Q10. Complete the form in multiorderform.php so that the device ID is 
// passed through to multiorder.php via a hidden field. 

echo "<form method='post' action='multiorder.php'>";
echo "Quantity to order: <input name='qty' />";
echo "<input type='hidden' name='id' value='$id'/>";
echo "<input type='submit' value='Go!' />";
echo "</form>";

?>

</body>
</html>
