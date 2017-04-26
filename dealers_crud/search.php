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
                <option value="Vin">Vin</option>
                <option value="Model">Model</option>
                <option value="Make">Make</option>
                <option value="Year">Year</option>
                <option value="Mileage">Mileage</option>
                <option value="Bno">Bno</option>
                <option value="Rrp">Rrp</option>    
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
        $query = "SELECT * FROM Cars WHERE $category = '$criteria'";
        $result = mysqli_query($mysqli, $query) or die('error getting data');
        
        echo "<table>";
        echo "<tr><th>Vin</th><th>Model</th><th>Make</th><th>Year</th><th>Mileage</th><th>Bno</th><th>Rrp</th></tr>";
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
            echo "<tr><td>";
            echo $row['Vin'];
            echo "</td><td>";
            echo $row['Model'];
            echo "</td><td>";
            echo $row['Make'];
            echo "</td><td>";
            echo $row['Year'];
            echo "</td><td>";
            echo $row['Mileage'];
            echo "</td><td>";
            echo $row['Bno'];
            echo "</td><td>";
            echo $row['Rrp'];
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

