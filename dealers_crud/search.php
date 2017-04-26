<html>
    <head>
        <meta charset="UTF-8">
        <title>Car Search</title>
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
            tr.alt td
            {
                background: #ecf6fc;
            }
            tr.over td
            {
                background: #bcd4ec;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function () {  
                $(".t1 tr").mouseover(function () { 
                    $(this).addClass("over");
                }).mouseout(function () { 
                    $(this).removeClass("over");
                })
                $(".t1 tr:even").addClass("alt");
            });
        </script>
    </head>
    <body>
    <h1 style = "color: gray; font-family: Courier New;">Search for car: </h1>
    
    <form method="post" action ="search.php" align="center" style = "font-weight: bold">
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
        
        echo "<table width='80%' border='0' class='t1' align='center'>";
        echo "<tr><th>Vin</th><th>Model</th><th>Make</th><th>Year</th><th>Mileage</th><th>Bno</th><th>Rrp</th></tr>";
        
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            
            echo "<tr align='center'><td>";
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
    <form action="index.html">
        <br><br><br>
        <div align="center">
            <input type="submit" value="Back to Home">
        </div>
	</form>
	    
    </body>
</html>

