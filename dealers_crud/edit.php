<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$Id = mysqli_real_escape_string($mysqli, $_POST['Id']);
	
	$Fname = mysqli_real_escape_string($mysqli, $_POST['Fname']);
	$Minit = mysqli_real_escape_string($mysqli, $_POST['Minit']);
	$Lname = mysqli_real_escape_string($mysqli, $_POST['Lname']);
	$Address = mysqli_real_escape_string($mysqli, $_POST['Address']);
	$Sex = mysqli_real_escape_string($mysqli, $_POST['Sex']);
	$Phone = mysqli_real_escape_string($mysqli, $_POST['Phone']);	
	$Branch_no = mysqli_real_escape_string($mysqli, $_POST['Branch_no']);		
	
		
		mysqli_query($mysqli,"DELETE FROM branch WHERE Branch_no='$Branch_no");
		//updating the table
		mysqli_query($mysqli,"INSERT INTO branch(Bno) VALUES ('$Branch_no')");
		$result = mysqli_query($mysqli, "UPDATE dealers SET Fname='$Fname',Minit='$Minit',Lname='$Lname',Address='$Address',Sex='$Sex',Phone='$Phone',Branch_no='$Branch_no' WHERE Id=$Id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	
}
?>
<?php
//getting id from url
$Id = $_GET['Id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM dealers WHERE Id=$Id");


while($res = mysqli_fetch_array($result))

{	
	$Id=$res['Id'];
	$Fname = $res['Fname'];
	$Minit = $res['Minit'];
	$Lname = $res['Lname'];
	$Address = $res['Address'];
	$Sex = $res['Sex'];
	$Phone = $res['Phone'];
	$Branch_no = $res['Branch_no'];
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
				<td>Id</td>
				<td><input type="text" name="Id" value="<?php echo $Id;?>" required></td>
			</tr>
			<tr> 
				<td>Fname</td>
				<td><input type="text" name="Fname" value="<?php echo $Fname;?>" required></td>
			</tr>
			<tr> 
				<td>Minit</td>
				<td><input type="text" name="Minit" value="<?php echo $Minit;?>" ></td>
			</tr>
			<tr> 
				<td>Lname</td>
				<td><input type="text" name="Lname" value="<?php echo $Lname;?>" required></td>
			</tr>
			<tr> 
				<td>Address</td>
				<td><input type="text" name="Address" value="<?php echo $Address;?>" required></td>
			</tr>
			<tr> 
				<td>Sex</td>
				<td><input type="text" name="Sex" value="<?php echo $Sex;?>" required></td>
			</tr>
			<tr> 
				<td>Phone</td>
				<td><input type="text" name="Phone" value="<?php echo $Phone;?>" required></td>
			</tr>
			<tr> 
				<td>Branch_no</td>
				<td><input type="text" name="Branch_no" value="<?php echo $Branch_no;?>" required></td>
			</tr>
			<tr>
				<td><input type="hidden" name="Id" value=<?php echo $_GET['Id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

	<form action="index.php">
		<input type="submit" value="Back to Home">

	</form>
</body>
</html>
