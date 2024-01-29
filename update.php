<?php
include_once 'database.php';
$result = mysqli_query($conn,"SELECT * FROM books");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
	  <tr>
	    <td>Sl No</td>
		<td>rmid</td>
        <td>bkin</td>
        <td>bkout</td>
		<td>status</td>
		<td>Action</td>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["rmid"]; ?></td>
		<td><?php echo $row["bkin"]; ?></td>
		<td><?php echo $row["bkout"]; ?></td>
        <td><?php echo $row["bkstatus"]; ?></td>
		<td><a href="update-process.php?id=<?php echo $row["id"]; ?>">Update</a></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>