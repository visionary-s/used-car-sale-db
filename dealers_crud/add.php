<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Vin = mysqli_real_escape_string($mysqli, $_POST['Vin']);
	$Model = mysqli_real_escape_string($mysqli, $_POST['Model']);
	$Make = mysqli_real_escape_string($mysqli, $_POST['Make']);
	$Year = mysqli_real_escape_string($mysqli, $_POST['Year']);
	$Mileage = mysqli_real_escape_string($mysqli, $_POST['Mileage']);
	$Bno = mysqli_real_escape_string($mysqli, $_POST['Bno']);
	$Rrp = mysqli_real_escape_string($mysqli, $_POST['Rrp']);
		 
		// if all the fields are filled (not empty) 
			
		//insert data to database
		mysqli_query($mysqli,"SET GLOBAL FOREIGN_KEY_CHECKS=0;");
		mysqli_query($mysqli,"INSERT INTO Branch(Bno) VALUES ('$Branch_no')");
		$result = mysqli_query($mysqli, "INSERT INTO Cars(Vin,Model,Make,Year,Mileage,Bno,Rrp) VALUES('$Vin','$Model','$Make','$Year','$Mileage','$Bno','$Rrp')");
		mysqli_query($mysqli,"SET GLOBAL FOREIGN_KEY_CHECKS=1;");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	
}
?>

</body>
</html>
