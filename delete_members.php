<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Delete Form</title>
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


<!--confirmation of details being deleted and includes SQL connect--> 
<?php
if (!isset($_POST['gyms']))
{
   echo "<h2>No gyms to delete</h2>";
   exit;
}

require_once("config.inc.php");
$conn=ConnectionFactory::connect();

 /*
Select query from gym table
*/
$query="DELETE FROM gym WHERE gym_id=:gym_id";
$pr_stmt=$conn->prepare($query);
$affected_rows=0;

 /*
for each loop for gym_id
*/
foreach($_POST['gyms'] as $gym_id)
{
	echo "<h2>gym id is</h2>".$gym_id."<br>";
	$pr_stmt->bindValue(':gym_id',$gym_id);
	$affected_rows += $pr_stmt->execute();
}
echo "<h2>deleted".$affected_rows." gyms</h2>";
$conn=null; 
?>
<!--confirmation of details being deleted and includes SQL connect--> 
</body>
</html>