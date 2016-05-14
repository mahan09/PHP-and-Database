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
<?php include ("DBCLASS.php");?>


<!--page sub header-->
<h3>Add GYM</h3>


<!--Form tag using various controls - also includes a submit and clear button-->
<div id="form1">

<form action="add_personal.php" method="post" enctype="multipart/form-data">
<p class="required">*Required</p>
    
<label for="gym_name"><span>*</span><strong>Gym name:</strong></label>
<input type="text" class="textbox" name="gym_name" placeholder="Enter a gym name">
    
  <!--gym town dropdown boxes-->  
<label for="gym_town"><span>*</span><strong>Gym town:</strong></label>
<select id="gym_town" name="gym_town">
<option value="">Select a town</option>
<option value="Bury">Bury</option>
<option value="Huddersfield">Huddersfield</option>
<option value="Whitefield">Whitefield</option>
<option value="Stockport">Stockport</option>
<option value="Cheadle">Cheadle</option>
<option value="Rochdale">Rochdale</option>
<option value="Other">Other</option>
</select>
    
	  <!--gym city dropdown boxes-->  
<label for="gym_city"><span>*</span><strong>Gym city:</strong></label>		
<select id="gym_city" name="gym_city">
<option value="">Select a city</option>
<option value="Manchester">Manchester</option>
<option value="Liverpool">Liverpool</option>
<option value="London">London</option>
<option value="Leeds">Leeds</option>
<option value="Newcastle">Newcastle</option>
<option value="Birmingham">Birmingham</option>
<option value="Other">Other</option>
</select>
    
   <!--gym county radio button-->     
<fieldset>
<label for="county"><span>*</span><strong>Gym county:</strong></label>
<input type="radio" name="county" value=""checked>N/A<br>
<input type="radio" name="county" value="Lancashire">Lancashire
<input type="radio" name="county" value="West Midland">West Midland
</fieldset>

    
    
    <!--gym postcode text box-->  
<label for="gym_postcode"><span>*</span><strong>Gym postcode:</strong></label>
<input type="text" class="textbox" name="gym_postcode" placeholder="Enter a gym postcode">
  
 <!--gym founded year date input-->  
<label for="gym_found_year"><span>*</span><strong>Founded:</strong></label>
<input type="month" name="gym_found_year">	

<!--personal trainer dropdown box - dynamatically generated-->  
<label for="personal_id"><span>*</span><strong>Choose a personaltrainer:</strong></label>
<select id="personal_id" name="personal_id">
<option value="">Select a personaltrainer</option>
</div>

<!--SQL connection and dynamic dropdown box from the MYSQL connection using a different query-->
<?php
$conn=ConnectionFactory::connect();

$stmt=$conn->prepare("SELECT * FROM personaltrainer");
$query="SELECT * FROM personaltrainer";
$resultset = $conn->query($query);

while ($row = $resultset->fetch())
{
        
		echo '<option value="'.$row['personal_id'].'">'.$row['first_name'].'</option>';
                
		
	
}




$conn=NULL;
?>

</select>


<!--member dropdown box - dynamatically generated-->  
<label for="member_id"><span>*</span><strong>Choose a member</strong></label>
<select id="member_id" name="member_id">
<option value="">Select a member</option>


<!--SQL connection and dynamic dropdown box from the MYSQL connection using a different query-->
<?php
require_once("config.inc.php");
$conn=ConnectionFactory::connect();

$stmt=$conn->prepare("SELECT * FROM member");
$query="SELECT * FROM member";
$resultset = $conn->query($query);

while ($row = $resultset->fetch())
{
        
		echo '<option value="'.$row['member_id'].'">'.$row['member_first_name'].'</option>';
                
		
	
}




$conn=NULL;
?>

</select>
 

<!--Form submit and clear buttons-->
<input type="submit" name="submit" value="Add Member">
<button type="reset" value="reset"><strong>Clear</strong></button>
</form>
</div>
</div>
</body>
</html>