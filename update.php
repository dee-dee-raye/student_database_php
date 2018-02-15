<html>
<head>
<title>Update</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.2.0.min.js"></script>
</head>
<body>


<p id="requiredTitle"> * required field.</p>
<?php

include('database.php');


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

	$sql = "UPDATE student SET first_name = '$fname', last_name = '$lname', email='$email', gender='$gender', classification='$classification', city='$city', state='$state', zip='$zip' WHERE id = $id";
	echo $sql;
	if ($conn->query($sql) === TRUE) {
		echo "Record updated successfully";
	} else {
		echo "Error updating record: " . $conn->error;
	}

	header("Location: index.php");
	exit;


} // end of the main if statement

$idToUpdate=$_GET['id'];

$sqlget = "SELECT * FROM student WHERE ID = ".$idToUpdate;
$sqldata = mysqli_query($conn, $sqlget) or die('error getting data');
$row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC);
?>

<!-- checked="checked" -->

<form id="formOfInfo" method="post" action="update.php" style="display:inline; text-align:left">
<input type="hidden" name="submitted" value="true" />
<fieldset>
	<legend>Update</legend>
	<label style="display:inline">ID: <input type="text" name="id" value="<?php echo $row['id']?>"/></label> <p id="required">*</p> <br>
	<label>First Name: <input type= "text" name="fname" value= "<?php echo $row['first_name']?>"/></label><p id="required">*</p> <br>
	<label>Last Name: <input type= "text" name= "lname" value= "<?php echo $row['last_name']?>"/></label><p id="required">*</p> <br>
	<label>Email: <input type="text" name="email" value= "<?php echo $row['email']?>" /></label> <p id="required">*</p> <br> <br>
	<label>City: <input type="text" name="city" value= "<?php echo $row['city']?>"/></label>  <p id="required">*</p> <br>
	<label>State: <input type="text" name="state" value= "<?php echo $row['state']?>"/></label>  <p id="required">*</p> <br>
	<label>Zip: <input type="text" name="zip" value= "<?php echo $row['zip']?>"/></label>  <p id="required">*</p> <br>
	<label>Classification: <br><input type="radio" name="classification" value="freshman" 
	<?php if($row['classification'] == "freshman"){echo"checked='checked'";}?>>Freshman<br>
	<input type="radio" name="classification" value="sophomore"
	<?php if($row['classification'] == "sophomore"){echo"checked='checked'";}?>>Sophomore<br>
	<input type="radio" name="classification" value="junior"
	<?php if($row['classification'] == "junior"){echo"checked='checked'";}?>>Junior<br>
	<input type="radio" name="classification" value="senior"
	<?php if($row['classification'] == "senior"){echo"checked='checked'";}?>>Senior<br>
	</label>
	<label>Gender: <br><input type="radio" name="gender" value = "male"
	<?php if($row['gender'] == "male"){echo"checked='checked'";}?>>Male<br>
	<input type="radio" name="gender" value="female"
	<?php if($row['gender'] == "female"){echo"checked='checked'";}?>>Female<br>
	</label>
</fieldset>
<br />
<input id="basicallyAButton" type="button" value="update student" />

</form>


<form class='inline'>
	<button type="button" id="backButton">Go Back</button>
</form>

<script>

$("#backButton").click(function(){
	window.location.href='index.php';
});

$("#basicallyAButton").click(function(){
	//$("#formId").submit();
	$("#formOfInfo").submit();
			
	
});


</script>



</body>






</html>
