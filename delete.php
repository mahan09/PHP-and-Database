<!DOCTYPE html>
<html>
<head>
    <title>Homepage get fit.</title>
        <link href="../Zeraat-Talab_Mahan_Assign1\Css\style.css" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Andika' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Rancho' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Pompiere' rel='stylesheet' type='text/css'>
</head>
<body>
    
<!--webpage DIV ids-->
<div id="wholepage">
<div id="container">
    
    
<!--PHP include files-->   
<?php include ("Header.html");?>
<?php include ("nav.html");?>
<h3>Delete GYM</h3>
<?php include ("DBCLASS.php");?>


<!--page frorm-->
<div id="form2">
<form action="delete_members.php" method="post">
    

<!--SQL connection, SELECT query and checkboxes for delete information from the selected table-->
<?php

require_once("config.inc.php");
$conn=ConnectionFactory::connect();

 /*
select query from gym table
*/
$query = "SELECT * FROM gym";
$resultset = $conn->query($query);
while ($row = $resultset->fetch())
{
     /*
the results will be displayed in check boxes dynamatically from database tables
*/
                echo "<p>";
		echo "<input type='checkbox' name='gyms[]' id='gym".$row['gym_id']."' value='".$row['gym_id']."'>";
		echo "<label for='gym".$row['gym_id']."'>".$row['gym_name']." ".$row['gym_town']." ".$row['gym_city']."</label>";
		echo "</p>";
                echo "<br>";
}
?>

<!--Form submit button-->  
<input type="submit" value="Delete Records">
</form> 
</div>


</div>
</div>
</body>
</html>