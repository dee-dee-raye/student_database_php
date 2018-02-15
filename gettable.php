<?php
$page=5;
$start=$_GET['start'];

include('database.php');




$sqlget = "SELECT * FROM student LIMIT ". $page." OFFSET ".$start;
$result = $conn->query($sqlget);

if($result->num_rows > (0))
{
	echo "<table id = 'student-list-table'>";
	echo "<tr><th>Select</th><th>ID</th><th>First Name</th><th>Last Name</th>";
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) 
	{
		$rowNum = $row['id'];
		echo "<tr><td>";
		echo "<input type='radio' value=\"$rowNum\" name='radioButton' onchange='selectChange()'/>";
		echo "</td><td>";
		echo $row['id'];
		echo "</td><td>";
		echo $row['first_name'];
		echo "</td><td>";
		echo $row['last_name'];
		echo "</td>";
		echo"</form>";
	}
	
	echo "</table>";
	
	
}





?>