<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "roombook";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE books SET 
			bkin = '".$_POST["bkin"]."' ,
			bkout = '".$_POST["bkout"]."' ,
			bkcust = '".$_POST["bkcust"]."' ,
			bktel = '".$_POST["bktel"]."' ,
			WHERE rmid = '".$_POST["rmid"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "Record update successfully";
	}

	mysqli_close($conn);
?>
</body>
</html>