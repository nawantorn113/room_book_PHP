<?php
include_once 'database.php';
require 'mysql/config.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE books set id='" . $_POST['id'] . "', rmid='" . $_POST['rmid'] . "', bkin='" . $_POST['bkin'] . "', bkout='" . $_POST['bkout'] . "'  WHERE id='" . $_POST['id'] . "'");
    $message = "Record Modified Successfully";
}
?>
<script>
    alert('<?php echo $message; ?>');
</script>
<?php
$result = mysqli_query($conn, "SELECT * FROM books WHERE id='" . $_GET['id'] . "'");
$row = mysqli_fetch_array($result);

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>ระบบจองห้องพัก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

    <body class="container p-5  ">
        <h1>ระบบจองห้องพัก</h1>
        <hr><br />
        <form  name="frmUser" method="post" action="" class ="">
            <div style="padding-bottom:5px;">
            </div>
            ID: <br>
            <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly class="form-controlmy-2 ">
            <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
            <br>
            ROOM ID: <br>
            <input type="text" name="rmid" class="txtField" value="<?php echo $row['rmid']; ?> " readonly class="form-controlmt-2 " style="width:30%;">
            <br>
            DATE IN :<br>
            <input type="date" name="bkin" class="txtField" value="<?php echo $row['bkin']; ?>" readonly class="form-control mt-2" style="width:30%;">
            <br>    
            DATE OUT:<br>
            <input type="date" name="bkout" class="txtField" value="<?php echo $row['bkout']; ?>" class="form-control" style="width:30%;">
            <br>
            
            <input type="submit" name="submit" value="ตกลง" class="btn btn-primary my-3" href="books_list4.php">
            <a href="books_list4.php" class="btn btn-secondary my-3 ">ย้อนกลับ</a>
        </form>
        <script>
            var vurl = "books_list4.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";

            function bookstatus(v1, v2, v3) {
                var v4 = vurl += "&rmid=" + v1 + "&bkin=" + v2 + "&bkstatus=" + v3;
                window.location.replace(v4);
            }
        </script>
    </body>

</html>