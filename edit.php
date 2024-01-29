<html>
<head>
<title>ThaiCreate.Com PHP & MySQL (mysqli)</title>
</head>
<body>
<?php
   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
   $userName = "sa";
   $userPassword = "";
   $dbName = "roombook";

   $strrmid = null;

   if(isset($_GET["rmid"]))
   {
	   $strrmid = $_GET["rmid"];
   }
  
   $serverName = "localhost";
   $userName = "root";
   $userPassword = "root";
   $dbName = "roombook";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM books WHERE rmid = '".$strrmid."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<form action="save.php" name="frmAdd" method="post">
<table width="284" border="1">
  <tr>
    <th width="120">ห้อง</th>
    <td width="238"><input type="hidden" name="rmid" value="<?php echo $result["rmid"];?>"><?php echo $result["rmid"];?></td>
    </tr>
  <tr>
    <th width="120">Name</th>
    <td><input type="date" name="bkin" size="20" value="<?php echo $result["bkin"];?>"></td>
    </tr>
  <tr>
    <th width="120">Email</th>
    <td><input type="date" name="bkout" size="20" value="<?php echo $result["bkout"];?>"></td>
    </tr>
  <tr>
    <th width="120">CountryCode</th>
    <td><input type="text" name="bkcust" size="2" value="<?php echo $result["bkcust"];?>"></td>
    </tr>
  <tr>
    <th width="120">Budget</th>
    <td><input type="text" name="bktel" size="5" value="<?php echo $result["bktel"];?>"></td>
    </tr>
  </table>
  <input type="submit" name="submit" value="submit">
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>