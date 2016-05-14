<!DOCTYPE html>
<html>
<head>
<title>Display personal trainer</title>
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


<!--SQL connection-->
<?php
require_once("config.inc.php");
$conn=ConnectionFactory::connect();

/*
 Arrays
*/

$gym_name=$_POST['gym_name'];
$gym_town=$_POST['gym_town'];
$gym_city=$_POST['gym_city'];
$gym_postcode=$_POST['gym_postcode'];
$personal_id=$_POST['personal_id'];
$member_id=$_POST['member_id'];
$gym_found_year=$_POST['gym_found_year'];
$county=$_POST['county'];



/*
 Form validation using various validations such as empty boxes, postcode format and numerical data.
*/
if($gym_name=="" || $gym_town=="" || $gym_city=="" || $gym_postcode=="" || $personal_id=="" || $member_id=="" || $gym_found_year=="")


	{
	echo "<b><h3>You need to complete all the details</h3></b>";
	exit;	
	}

else if($county=="")
{
	echo "<b><h3>You need to select one county</h3></b>";
	exit;	
	}

else if (is_numeric($gym_name)) 
	{
	echo "<b><h3>Gym name cant contain numbers</h3></b>";
	exit;	
	}

else if (is_numeric($gym_town)) 
	{
	echo "<b><h3>Gym town cant contain numbers</h3></b>";
	exit;	
	}

else if (is_numeric($gym_city)) 
	{	
	echo "<b><h3>Gym city cant contain numbers</h3></b>";
	exit;	
	}
	
/*
postcode validation using various expressions.
*/
	
$gym_postcode = strtoupper(str_replace(' ','',$gym_postcode));
    if(preg_match("/^[A-Z]{1,2}[0-9]{2,3}[A-Z]{2}$/",$gym_postcode) || preg_match("/^[A-Z]{1,2}[0-9]{1}[A-Z]{1}[0-9]{1}[A-Z]{2}$/",$gym_postcode) || preg_match("/^GIR0[A-Z]{2}$/",$gym_postcode))
	{
        true;
	}
    else
	{
        echo "<b><h3>Invalid postcode format</h3></b>";
	exit;
	}


/*
My form insert query which insert data into MySQL form
*/

$query="INSERT INTO gym VALUES (NULL,:gym_name,:gym_town,:gym_city,:gym_postcode,:personal_id,:member_id,:gym_found_year,:county)";

$stmt=$conn->prepare($query);
$stmt->bindValue(':gym_name',$gym_name);
$stmt->bindValue(':gym_town',$gym_town);
$stmt->bindValue(':gym_city',$gym_city);
$stmt->bindValue(':gym_postcode',$gym_postcode);
$stmt->bindValue(':personal_id',$personal_id);
$stmt->bindValue(':member_id',$member_id);
$stmt->bindValue(':gym_found_year',$gym_found_year);
$stmt->bindValue(':county',$county);
$affected_rows = $stmt->execute();

 /*
confirmation message of input data
*/
if($affected_rows==1){
	echo "<b><h2>Successfully added the details for</h2></b>".$gym_name." ".$gym_town." ".$gym_city." ".$gym_postcode." ".$personal_id." ".$member_id." ".$gym_found_year." ".$county;
}


?>

</body>
</html>