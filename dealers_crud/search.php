<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Search</title>
        <style type="text/css">
            table{
                background-color: #663399;
                color:yellow;
            }
            th{
                border-bottom:150px;
                text-align: left;
            }
        </style>
    </head>
    <body>
    <hl>Dealer search</hl>
    
    <form method="post" action ="search.php">
        <input type="hidden" name="submitted" value="true" />
        
        <label>Search Category:
            <select name="category">
                <option value="Id">Id</option>
                <option value="Fname">Fname</option>
                <option value="Minit">Minit</option>
                <option value="Lname">Lname</option>
                <option value="Address">Lname</option>
                <option value="Sex">Sex</option>
                <option value="Phone">Phone</option>
                <option value="Branch_no">Phone</option>     
            </select>
        </label>
        
        <label>Search Criteria: <input type="text" name="criteria" /></label>
        
        <input type="submit" />
        
    </form>
    
    <?php
    
    if(isset($_POST['submitted'])){
        //connect to the database
        include('config.php');
        
        $category = $_POST['category'];
        $criteria = $_POST['criteria'];
        $query = "SELECT * FROM dealers WHERE $category = '$criteria'";
        $result = mysqli_query($mysqli, $query) or die('error getting data');
        
        echo "<table>";
        echo "<tr><th>Id</th><th>Fname</th><th>Minit</th><th>Lname</th><th>Address</th><th>Sex</th><th>Phone</th><th>Branch_no</th></tr>";
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
            echo "<tr><td>";
            echo $row['Id'];
            echo "</td><td>";
            echo $row['Fname'];
            echo "</td><td>";
            echo $row['Minit'];
            echo "</td><td>";
            echo $row['Lname'];
            echo "</td><td>";
            echo $row['Address'];
            echo "</td><td>";
            echo $row['Sex'];
            echo "</td><td>";
            echo $row['Phone'];
            echo "</td><td>";
            echo $row['Branch_no'];
            echo "</td><tr>";
            
        }
        
        echo "</table>";
        
    }// end of main if statement   
    
    ?>
    <form action="index.php">
		<input type="submit" value="Back to Home">

	</form>
    
    </body>
</html>

