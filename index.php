<html>
<head>
<title>Display</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-3.2.0.min.js"></script>
</head>
<body>

<h1>Student List</h1>

<script>


function createTable(start) 
{
	
// 	 xmlhttp = new XMLHttpRequest();
// 	 xmlhttp.onreadystatechange=function() {
// 		 if(xmlhttp.readyState == 4 & xmlhttp.status==200) {
// 			 document.getElementById("student-list-table").innerHTML = xmlhttp.responseText;
// 		 }
// 	 };
// 	 xmlhttp.open("GET", "gettable.php?start="+start,true);
// 	 xmlhttp.send();


	 $("#student-list-table").load("gettable.php?start="+start);
}



</script>

<div id="annieDiv">

<img src='annie glitter.gif' id='rightAnnie'></img>

</div>

<?php 
$page=5;
$start=0;



include('database.php');

$sqlget = "SELECT * FROM student LIMIT ". $page." OFFSET ".$start;
$sqldata = mysqli_query($conn, $sqlget) or die('error getting data');

echo "<div>";



echo "<form id='formForDisplay' action=\"delFun()\" method=\"post\">";
echo"<input type='hidden' name='val' value=''>";
echo "<table id = 'student-list-table'>";
echo "<tr><th>Select</th><th>ID</th><th>First Name</th><th>Last Name</th>";
$finished=false;
while($row = mysqli_fetch_array($sqldata, MYSQLI_ASSOC)) {
	
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
	$finished=true;
}

echo "</table>";


echo "</div>";





	
	function delFun() {
		include('database.php');
		$d="DELETE FROM student WHERE id=" .$_POST['val'];
		if($conn->query($d)==TRUE)
		{
			echo "Record deleted successfully";
		}
		else
		{
			echo "Error deleting record: " . $conn->error;
		}
	}
	
	if(array_key_exists('delete', $_POST))
	{
		delFun();
	}


?>


<script type="text/javascript">

var start = 0;
var page = 5;

createTable(start);

// function forwards()
// {
// 	start=start+page;
// 	if(start <1) start =0;
// 	createTable(start);
// }

// function backwards()
// {
// 	start=start-page;
// 	if(start <1) start =0;
// 	createTable(start);
// }

 function getValue()
{

	 

		var radios = $("[name='radioButton']");

	for (var i = 0, length = radios.length; i < length; i++) {
	    if (radios[i].checked) {
	        var radioValue=radios[i].value;

	        i=radios.length;
	    }
	}

	return radioValue;

	
}

 function selectChange()
 {
	id=getValue();
	$("#updateID").val(id);
	$("#deleteID").val(id);
	
	//document.getElementById("selectID").innerHTML=id;
	//document.getElementById("updateID").value=id;
	//document.getElementById("deleteID").value=id;
	
 }

 

</script>

<div>
<button type='button' id='navButtonBack'>Previous</button>
<button type='button' id='navButtonFor' >Next</button>
</div>
<br>
<br>
<div>

<!-- <form class='inline' action="update.php" method="get"> -->
<!-- 	<input id="updateID" type="hidden" name="id" value=""> -->
<!-- 	<button type="submit">Update</button> -->
<!-- </form> -->


<form class='inline'>
	<input id="updateID" type="hidden" name="id" value="">
	<button type="button" id="updateButton">Update</button>
</form>

<form class='inline'>
	<button type="button" id="insertButton">Add</button>
</form>

<form class='inline'>
<input id="deleteID" type ="hidden" name="id" value="">
<button type="button" id="deleteButton">Delete</button>
</form>

</div>

<script>
$("#navButtonBack").click(function(){

	start=start-page;
	if(start <1) start =0;
	createTable(start);
});

$("#navButtonFor").click(function(){

	start=start+page;
	if(start <1) start =0;
	createTable(start);
});

$("#updateButton").click(function(){
	window.location.href='update.php?id='+$("#updateID").val();
});

$("#deleteButton").click(function(){
	window.location.href='delete.php?Email=id='+$("#deleteID").val();
});

$("#insertButton").click(function(){
	window.location.href='insert.php';
});

</script>

</body>

</html>