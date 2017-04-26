<?php
//including the database connection file
include("config.php");

//getting id of the data from url
$Id = $_GET['Id'];

//deleting the row from table
$result = mysqli_query($mysqli, "DELETE FROM dealers WHERE Id=$Id");

//redirecting to the display page (index.php in our case)
header("Location:index.php");
?>

