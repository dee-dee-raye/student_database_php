<?php
if(isset($_POST['submitted'])) {

	include('database.php');

	$id=$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email = $_POST['email'];
	$classification=$_POST['classification'];
	$gender=$_POST['gender'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$zip=$_POST['zip'];

	if($id=="")
	{
		header("Location: error.php");
		exit;
	}
	else if($fname == "")
	{
		header("Location: error.php");
		exit;
	}
	else if($lname == "")
	{
		header("Location: error.php");
		exit;
	}
	else if($email == "")
	{
		header("Location: error.php");
		exit;
	}
	else if($city == "")
	{
		header("Location: error.php");
		exit;
	}
	else if($state == "")
	{
		header("Location: error.php");
		exit;
	}
	else if($zip == "")
	{
		header("Location: error.php");
		exit;
	}
	include('database.php');
	

	$squlinsert = "INSERT INTO student (id, first_name, last_name, gender, classification, email, city, state, zip)
	VALUES ('$id', '$fname', '$lname', '$gender', '$classification', '$email', '$city', '$state', '$zip')";

	if(!mysqli_query($conn, $squlinsert)) {
		die('error inserting new record');
	} //end of my nested if statement

	$newrecord = "1 record added to database";



} // end of the main if statement

?>




<html>
<head>
<title>Insert</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.2.0.min.js"></script>
</head>
<body>


<h1>Student Add</h1>
<p id="requiredTitle"> * required field.</p>

<form method="post" action="insert.php" style="display:inline; text-align:left">
<input type="hidden" name="submitted" value="true" />
<fieldset >
	<legend>New Student</legend>
	<label>ID: <input type="text" name="id" /></label>  <p id="required">*</p> <br>
	<label>First Name: <input type= "text" name="fname" /></label>  <p id="required">*</p> <br>
	<label>Last Name: <input type= "text" name= "lname" /></label>  <p id="required">*</p> <br>
	<label>Email: <input type="text" name="email" /></label>  <p id="required">*</p> <br>
	<label>Zip: <input id= "zip" type="text" name="zip" /></label>  <p id="required">*</p> <br>
	<label>City: <input id="city" type="text" name="city" /></label>  <p id="required">*</p> <br>
	<label>State: <input type="text" id="state" name="state" /></label>  <p id="required">*</p> <br>
	<label>Classification: <br><input type="radio" name="classification" value="freshman">Freshman<br>
	<input type="radio" name="classification" value="sophomore">Sophomore<br>
	<input type="radio" name="classification" value="junior">Junior<br>
	<input type="radio" name="classification" value="senior">Senior<br>
	</label>
	<label>Gender: <br><input type="radio" name="gender" value = "male">Male<br>
	<input type="radio" name="gender" value="female">Female<br>
	</label>
</fieldset>
<br />
<br>
<input id="basicallyAButton" type="submit" value="Add New Student" />

</form>


<form class='inline' action="index.php" method="get">
	<button type="submit">Go Back</button>
</form>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->
<script>
$(document).ready(function(){
    $("input").blur(function(){
    	 var id = $(this).attr('id');
        if(id == "zip")
        {
            //document.getElementById("zip").value

			$.get("getlocation.php?zip="+ $("#zip").val(), 
					function(data) {

						var place = data.split(";");

						//document.getElementById("city").value==''
							//document.getElementById("city").value=place[0];
						//document.getElementById("state").value==''
							//document.getElementById("state").value=place[1];
						if($("#city").val() == '')
							$("#city").val(place[0]);
						if($("#state").val() == '')
							$("#state").val(place[1]);
							
							

					});
        }
    });
});
</script>


</body>






</html>
