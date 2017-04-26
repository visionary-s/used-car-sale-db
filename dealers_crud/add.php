<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$Id = mysqli_real_escape_string($mysqli, $_POST['Id']);
	$Fname = mysqli_real_escape_string($mysqli, $_POST['Fname']);
	$Minit = mysqli_real_escape_string($mysqli, $_POST['Minit']);
	$Lname = mysqli_real_escape_string($mysqli, $_POST['Lname']);
	$Address = mysqli_real_escape_string($mysqli, $_POST['Address']);
	$Sex = mysqli_real_escape_string($mysqli, $_POST['Sex']);
	$Phone = mysqli_real_escape_string($mysqli, $_POST['Phone']);
	$Branch_no=mysqli_real_escape_string($mysqli, $_POST['Branch_no']);
		 
		// if all the fields are filled (not empty) 
			
		//insert data to database
		mysqli_query($mysqli,"SET GLOBAL FOREIGN_KEY_CHECKS=0;");
		mysqli_query($mysqli,"INSERT INTO Branch(Bno) VALUES ('$Branch_no')");
		$result = mysqli_query($mysqli, "INSERT INTO dealers(Id,Fname,Minit,Lname,Sex,Phone,Branch_no) VALUES('$Id','$Fname','$Minit','$Lname','$Sex','$Phone','$Branch_no')");
		mysqli_query($mysqli,"SET GLOBAL FOREIGN_KEY_CHECKS=1;");
		//display success message
		echo "<font color='green'>Data added successfully.";
		echo "<br/><a href='index.php'>View Result</a>";
	
}
?>

</body>
</html>
