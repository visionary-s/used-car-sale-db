<?php
include_once("config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM dealers ORDER BY Id DESC");
?>

<html>
<head>	
	<title>Dealers</title>
	<script src="/scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
    <style type="text/css">
        .t1
        {
            clear: both;
            border: 1px solid #c9dae4;
        }
        .t1 tr th
        {
            color: #0d487b;
            background: #f2f4f8 repeat-x left bottom;
            line-height: 28px;
            border-bottom: 1px solid #9cb6cf;
            border-top: 1px solid #e9edf3;
            font-weight: normal;
            text-shadow: #e6ecf3 1px 1px 0px;
            padding-left: 5px;
            padding-right: 5px;
        }
        .t1 tr td
        {
            border-bottom: 1px solid #e9e9e9;
            padding-bottom: 5px;
            padding-top: 5px;
            color: #444;
            border-top: 1px solid #FFFFFF;
            padding-left: 5px;
            padding-right: 5px;
            word-break: break-all;
        }
        /* white-space:nowrap; text-overflow:ellipsis; */
        tr.alt td
        {
            background: #ecf6fc; /*这行将给所有的tr加上背景色*/
        }
        tr.over td
        {
            background: #bcd4ec; /*这个将是鼠标高亮行的背景色*/
        }
    </style>
    <script type="text/javascript">
        $(document).ready(function () { //这个就是传说的ready  
            $(".t1 tr").mouseover(function () {
                //如果鼠标移到class为stripe的表格的tr上时，执行函数  
                $(this).addClass("over");
            }).mouseout(function () {
                //给这行添加class值为over，并且当鼠标一出该行时执行函数  
                $(this).removeClass("over");
            }) //移除该行的class  
            $(".t1 tr:even").addClass("alt");
            //给class为stripe的表格的偶数行添加class值为alt
        });
    </script>
</head>

<body>


<h1 align="center" style = "color: gray; font-family: Courier New;">Dealer List</h1>
<br>
<form id="form1" runat="server">

	<table width="80%" id="ListArea" border="0" class="t1" align="center">
	<tr>
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
</form>	
<br><br><br>
	<div id = "back" style = "text-align: center;">
		<a href="index.html"> Back </a>
	</div>

</body>
</html>
