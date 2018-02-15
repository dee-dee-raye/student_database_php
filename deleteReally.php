<?php

include('database.php');
$idToDelete=$_GET['id'];
$d="DELETE FROM student WHERE id=" .$idToDelete;
if($conn->query($d)==TRUE)
{
	echo "Record deleted successfully";
	header("Location: index.php");
	exit;
}
else
{
	echo "Error deleting record: " . $conn->error;
}

?>
