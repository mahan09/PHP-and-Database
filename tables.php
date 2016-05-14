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
<div id="wholepage">
<div id="container">
    
<?php include ("Header.html");?>
<?php include ("nav.html");?>
<?php include ("DBCLASS.php");?>

<?php

 /*
database connection
*/
require_once("config.inc.php");
$conn=ConnectionFactory::connect();



echo '<img src="./images/assign.jpg" alt="assignment">';

 /*
my table design
*/
echo '<table id="starters" border="3">';
echo '<thead>';      
echo '<tr>';
echo '<th>gym_id</th>';
echo '<th>gym_name</th>';
echo '<th>gym_town</th>';
echo '<th>gym_city</th>';
echo '<th>gym_postcode</th>';
echo '<th>personal_id</th>';
echo '<th>member_id</th>';
echo '<th>gym_founded_year</th>';
echo '<th>county</th>';
echo '</tr>';
echo '</thead>';

 /*
select query to get all the data from the selected table
*/
$query = "SELECT * FROM gym";
$resultset = $conn->query($query);
$rows = $resultset->fetchAll(PDO::FETCH_OBJ);

foreach($rows as $row)
{
echo '<tbody>';
echo '<tr>';
echo '<td>';
echo $row->gym_id."<br>";
echo '</td>';
echo '<td>';
echo $row->gym_name."<br>";
echo '</td>';
echo '<td>';
echo $row->gym_town."<br>";
echo '</td>';
echo '<td>';
echo $row->gym_city."<br>";
echo '</td>';
echo '<td>';
echo $row->gym_postcode."<br>";
echo '</td>';
echo '<td>';
echo $row->personal_id."<br>";
echo '</td>';
echo '<td>';
echo $row->member_id."<br>";
echo '</td>';
echo '<td>';
echo $row->gym_found_year."<br>";
echo '</td>';
echo '<td>';
echo $row->county."<br>";
echo '</td>';
echo '</tr>';
echo '</table">';
}
echo '<table id="starters1" border="3">';
echo '<thead>';      
echo '<tr>';
echo '<th>personal_id</th>';
echo '<th>first_name</th>';
echo '<th>last_name</th>';
echo '<th>personal_date_of_birth</th>';
echo '<th>personal_city</th>';
echo '<th>personal_postcode</th>';
echo '<th>personal_gender</th>';
echo '<th>personal_images</th>';
echo '</tr>';
echo '</thead>';

 /*
select query to get all the data from the selected table
*/
$query = "SELECT * FROM personaltrainer";
$resultset = $conn->query($query);
$rows = $resultset->fetchAll(PDO::FETCH_OBJ);

foreach($rows as $row)
{
echo '<tbody>';
echo '<tr>';
echo '<td>';
echo $row->personal_id."<br>";
echo '</td>';
echo '<td>';
echo $row->first_name."<br>";
echo '</td>';
echo '<td>';
echo $row->last_name."<br>";
echo '</td>';
echo '<td>';
echo $row->personal_date_of_birth."<br>";
echo '</td>';
echo '<td>';
echo $row->personal_city."<br>";
echo '</td>';
echo '<td>';
echo $row->personal_postcode."<br>";
echo '</td>';
echo '<td>';
echo $row->personal_gender."<br>";
echo '</td>';
echo '<td>';
echo $row->personal_images."<br>";
echo '</td>';
echo '</tr>';
echo '</table">';
}



echo '<table id="starters3" border="3">';
echo '<thead>';      
echo '<tr>';
echo '<th>member_id</th>';
echo '<th>member_first_name</th>';
echo '<th>member_last_name</th>';
echo '<th>member_date_of_birth</th>';
echo '<th>member_city</th>';
echo '<th>member_postcode</th>';
echo '</tr>';
echo '</thead>';

 /*
select quert to get all the data from the selected table
*/
$query = "SELECT * FROM member";
$resultset = $conn->query($query);
$rows = $resultset->fetchAll(PDO::FETCH_OBJ);

foreach($rows as $row)
{
echo '<tbody>';
echo '<tr>';
echo '<td>';
echo $row->member_id."<br>";
echo '</td>';
echo '<td>';
echo $row->member_first_name."<br>";
echo '</td>';
echo '<td>';
echo $row->member_last_name."<br>";
echo '</td>';
echo '<td>';
echo $row->member_date_of_birth."<br>";
echo '</td>';
echo '<td>';
echo $row->member_city."<br>";
echo '</td>';
echo '<td>';
echo $row->member_postcode."<br>";
echo '</td>';
echo '</tr>';
echo '</table">';
}

$conn==NULL;;
?>

</div>
</div>
</body>
</html>