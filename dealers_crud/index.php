<?php
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM dealers ORDER BY Id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>


<h1 align="center">Dealers</h1>
<br>
	<table width='80%' border=0 align="center">

	<tr bgcolor='#CCCCCC'>
		<td>Id</td>
		<td>Fname</td>
		<td>Minit</td>
		<td>Lname</td>
		<td>Sex</td>
		<td>Phone</td>
		<td>Branch_no</td>
		<td colspan=2 align="center">Update</td>
	</tr>
	<?php 
	
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		// '.' is a string operator that concatenate arguments on both of its two sides
		echo "<td>".$res['Id']."</td>";
		echo "<td>".$res['Fname']."</td>";
		echo "<td>".$res['Minit']."</td>";
		echo "<td>".$res['Lname']."</td>";
		echo "<td>".$res['Sex']."</td>";
		echo "<td>".$res['Phone']."</td>";	
		echo "<td>".$res['Branch_no']."</td>";	
		//study notes(on PHP string):
		//Reference to http://php.net/manual/en/language.types.string.php
		// a.1. backslashes(\) in the following code are used to specify a double quote, it can also be used to specify a single quote
		// a.2. To specify a backslash, double it (\\)
		// b.1 In strings that are wrapped by double quotes, variable names will be expanded. And this is not the case for single-quoted strings.
		
		//c.1 about the question mark: http://stackoverflow.com/questions/14424162/php-how-do-question-marks-after-address-work

		//pass the array element of the selected entry via GET method to the corresponding php file
		echo "<td><a href=\"edit.php?Id=$res[Id]\">Edit</a></td>";

		//javascript method confirm(): Display a confirmation box
		//onClick event is support by some HTML tags
		echo "<td><a href=\"delete.php?Id=$res[Id]\" onClick=\"return confirm('Do you confirm this deleting operation?')\">Delete</a></td>";		
	}
	?>
	</table>

	<form action="add.html" style="text-align: center;">
		<input type="submit" value="Enter new data">

	</form>

	<form action="search.php" style="text-align: center;">
		<input type="submit" value="search for data">

	</form>


</body>
</html>
