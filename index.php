<!DOCTYPE html>
<html>
<head>
    <title>Your Fitness</title>
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
<?php include ("DBCLASS.php");?>



<!--page sub header-->
<h3>Search GYM</h3>


<h5> Hi, welcome to your fitness, on this website you can find your suitable gym, add you gym and delet your gym. enjoy surfing at this webpage</h5>

<h6>You can search by gym name, gym city and gym town. Our main aim is to make everything felixible for our users</h6>

<!--page frorm using PHP self and get method-->
<div id="form">
 

<form action="<?php echo $_SERVER['PHP_SELF'];?>"method="get">

<label for="search"><strong>Search for GYM:</strong></label>
<input type="text" name="search" id="search">

    
<!--FORM button-->
<input type="submit" name="submit" value="Search">
    

</div>

<!--php validation, database connection, SQL query, while loop and a hyperlink to another page-->
<?php

require_once("config.inc.php");
$conn=ConnectionFactory::connect();



if(!isset($_GET['search']))
{
	exit;
}

 /*
search box variable
*/
 
$search=$_GET['search'];

 /*
search box validation
*/
if($search=="")
{
	echo "<b><h3>Please enter a letter to search</b></h3>";
	exit;	
}

 /*
select query using OR operator which is more felixbile
*/

$stmt = $conn->prepare("SELECT * FROM gym WHERE gym_name LIKE :search || gym_city LIKE :search || gym_town LIKE :search");
$stmt->bindValue(':search','%'.$search.'%');
$stmt->execute();

$count = $stmt->rowCount();
{
    echo("<h4>Found $count Results</h4>");
}

 /*
while loop to display the search result
*/
    
while ($row = $stmt->fetch())
{
        echo "<li>";
		echo "<a href='show_personal.php?gym_name=".$row['gym_name']."'>".$row['gym_name']."</a>";
		
		echo "</li>";
}
echo "</ul>";
$conn=NULL;
?>


<!--php validation, database connection, SQL query, while loop and a hyperlink to another page-->


 

</div>

</div>

</body>
</html>
