<html>
<head>
<title>Delete</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.2.0.min.js"></script>
</head>
<body>
<div>
<?php
include('database.php');
$idToUpdate=$_GET['id'];

$sqlget = "SELECT * FROM student WHERE ID = ".$idToUpdate;
$sqldata = mysqli_query($conn, $sqlget) or die('error getting data');
$row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC);

?>
<p>Are you sure you want to delete <?php echo $row['id']?> - <?php echo $row['first_name']?> <?php echo $row['last_name']?></p>
<form class='inline'>
<input id="deleteID" type ="hidden" name="id" value="<?php echo $_GET['id'] ?>">
<button type="button" id="yesButton">Yes</button>
</form>
<form class='inline'>
<input id="deleteID" type ="hidden" name="id" value="">
<button type="button" id="noButton">No</button>
</form>
</div>
</body>
</html>

<?php
$idToDelete=$_GET['id'];
function deleteItMan($idToDelete)
{
	include('database.php');
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
}

if (isset($_GET['hello'])) {
	deleteItMan($idToDelete);
}

?>

<script>

$("#yesButton").click(function(){
	
	window.location.href='deleteReally.php?id='+$("#deleteID").val();
});

$("#noButton").click(function(){
	
	window.location.href='index.php';
});


</script>
