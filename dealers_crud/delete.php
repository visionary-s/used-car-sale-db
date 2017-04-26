<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$Vin = $_GET['Vin'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM Cars WHERE Vin=$Vin");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

