<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$Vin = mysqli_real_escape_string($mysqli, $_POST['Vin']);
	
	$Model = mysqli_real_escape_string($mysqli, $_POST['Model']);
	$Make = mysqli_real_escape_string($mysqli, $_POST['Make']);
	$Year = mysqli_real_escape_string($mysqli, $_POST['Year']);
	$Mileage = mysqli_real_escape_string($mysqli, $_POST['Mileage']);
	$Bno = mysqli_real_escape_string($mysqli, $_POST['Bno']);
	$Rrp = mysqli_real_escape_string($mysqli, $_POST['Rrp']);		
	
		
		mysqli_query($mysqli,"DELETE FROM branch WHERE Branch_no='$Branch_no");
		//updating the table
		mysqli_query($mysqli,"INSERT INTO branch(Bno) VALUES ('$Branch_no')");
		$result = mysqli_query($mysqli, "UPDATE Cars SET Vin='$Vin',Model='$Model',Make='$Make',Year='$Year',Mileage='$Mileage',Bno='$Bno',Rrp='$Rrp' WHERE Vin=$Vin");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	
}
?>
<?php
//getting id from url
$Vin = $_GET['Vin'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM Cars WHERE Vin=$Vin");


while($res = mysqli_fetch_array($result))

{	
	$Vin=$res['Vin'];
	$Model = $res['Model'];
	$Make = $res['Make'];
	$Year = $res['Year'];
	$Mileage = $res['Mileage'];
	$Bno = $res['Bno'];
	$Rrp = $res['Rrp'];
}

?>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	
	<form name="form1" method="POST" action="edit.php">
		<table border="0">
			<tr> 
				<td>Vin</td>
				<td><input type="text" name="Vin" value="<?php echo $Vin;?>" required></td>
			</tr>
			<tr> 
				<td>Model</td>
				<td><input type="text" name="Model" value="<?php echo $Model;?>" required></td>
			</tr>
			<tr> 
				<td>Make</td>
				<td><input type="text" name="Make" value="<?php echo $Make;?>" required></td>
			</tr>
			<tr> 
				<td>Year</td>
				<td><input type="text" name="Year" value="<?php echo $Year;?>" required></td>
			</tr>
			<tr> 
				<td>Mileage</td>
				<td><input type="text" name="Mileage" value="<?php echo $Mileage;?>" required></td>
			</tr>
			<tr> 
				<td>Bno</td>
				<td><input type="text" name="Bno" value="<?php echo $Bno;?>" required></td>
			</tr>
			<tr> 
				<td>Rrp</td>
				<td><input type="text" name="Rrp" value="<?php echo $Rrp;?>" required></td>
			</tr>
			
			<tr>
				<td><input type="hidden" name="Vin" value=<?php echo $_GET['Vin'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

	<form action="index.php">
		<input type="submit" value="Back to Home">

	</form>
</body>
</html>
