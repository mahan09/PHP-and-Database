<!DOCTYPE html>
<html>
<head>
<title>Display Genres</title>
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
<h3>GYM Details</h3>



<!--SQL connection, SQL join and display results using while loop-->
<?php

require_once("config.inc.php");
$conn=ConnectionFactory::connect();

if(!isset($_GET['gym_name']))
{
	echo "You shouldn't have got to this page";
	exit;
}
$gym_name = $_GET['gym_name'];

 /*
two SQL join to join two tables together
*/

$query ="SELECT gym.gym_id, gym.gym_name, gym.gym_postcode, gym.county, gym.gym_found_year, gym.gym_town, gym.gym_city, personaltrainer.personal_images, personaltrainer.personal_id, personaltrainer.first_name, personaltrainer.personal_gender, personaltrainer.last_name, personaltrainer.personal_city, personaltrainer.personal_date_of_birth, personaltrainer.personal_postcode, member.member_id, member.member_first_name, member.member_last_name, member.member_date_of_birth, member.member_city, member.member_postcode
FROM gym

INNER JOIN personaltrainer            ON gym.personal_id = personaltrainer.personal_id
INNER JOIN member                     ON gym.member_id = member.member_id

WHERE gym.gym_name=:gym_name";


$stmt = $conn->prepare($query);
$stmt->bindValue(':gym_name',$gym_name);
$stmt->execute();

 /*
while loop to display informations from all three tables
*/
while ($row = $stmt->fetch())
{
	
             echo "<ul>";
	     echo "<h4>Gym:</h4>";
	     echo "<h2>";
	     echo "<li>";
	     echo "<b>Gym Name:</b>"." ".$row['gym_name'];
	     echo "<li>";
             echo "<b>Gym Town:</b>"." ".$row['gym_town'];
	     echo "<li>";
             echo "<b>Gym City:</b>"." ".$row['gym_city'];
	     echo "<li>";
             echo "<b>Gym Postcode:</b>"." ".$row['gym_postcode'];
	     echo "<li>";
             echo "<b>Gym County:</b>"." ".$row['county'];
	     echo "<li>";
             echo "<b>Founded at:</b>"." ".$row['gym_found_year'];
	     echo "<br>";
	     echo "<br>";
	     echo "<h4>Personal Trainer:</h4>";
	     echo "<li>";
             echo "<b>First name:</b>"." ".$row['first_name'];
	     echo "<li>";
             echo "<b>Last name:</b>"." ".$row['last_name'];
	     echo "<li>";
             echo "<b>D.O.B:</b>"." ".$row['personal_date_of_birth'];
	     echo "<li>";
             echo "<b> Gender</b>"." ".$row['personal_gender'];
	     echo "<br>";
	     echo "<br>";
	     echo "<h4>Members:</h4>";
	     echo "<li>";
	     echo "<b>First name:</b>"." ".$row['member_first_name'];
	     echo "<li>";
	     echo "<b>Last name:</b>"." ".$row['member_last_name'];
	     echo "<li>";
	     echo "<b>D.O.B:</b>"." ".$row['member_date_of_birth'];
	     echo "<li>";
	     echo "<b>location:</b>"." ".$row['member_city'];
	     echo "<li>";
	     echo "<b>Postcode</b>"." ".$row['member_postcode'];
	     echo "<br>";
	     echo "<br>";
	     echo "<h4>Personal Trainer Picture:</h4>";
	     echo "<img src='".$row['personal_images']."' />";
             echo "</ul>";
		
	     
}

?>
</div>

</div>

<!--SQL connection, SQL join and display results using while loop-->






</body>
</html>
