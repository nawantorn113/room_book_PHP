<!DOCTYPE html>
<?php
require 'mysql/config.php';
$stdate = (isset($_GET['stdate'])) ? $_GET['stdate'] : date("Y-m-d");
$endate = (isset($_GET['endate'])) ? $_GET['endate'] : date("Y-m-d");
if (isset($_GET['rmid'])) {
    $rmid = $_GET['rmid'];
    $bkin = $_GET['bkin'];
    $bkstatus = $_GET['bkstatus'];
    require 'books_status.php';
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>ระบบจองห้องพัก<>/center></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="container p-5">
    <h1>ระบบจองห้องพัก</h1>
    <hr><br />
    <form action="books_list.php" method="GET">
        <label>เข้าพักวันที่</label>
        <input type="date" name="stdate" value="<?php echo $stdate; ?>" required class="form-control" style="width:30%;"/>
        <label>ถึง</label>
        <input type="date" name="endate" value="<?php echo $endate; ?>" required class="form-control" style="width:30%;"/><br />
        <button type="submit" class="btn btn-outline-secondary mb-3">ค้นหา</button>
        <a href="books_list.php" class="btn btn-outline-secondary mb-3">วันนี้</a>
        <a href="books_range.php" class="btn btn-outline-secondary mb-3">ทำรายการจอง</a>
        <a href="books_list2.php" class="btn btn-outline-secondary mb-3">รายการที่เคยทำ</a>
        <a href="books_list3.php" class="btn btn-outline-secondary mb-3" >พนักงาน</a>
        <a href="books_list4.php" class="btn btn-outline-secondary mb-3" >chack out</a>
        <a href="index.php?logout='1'" class="btn btn-outline-danger mb-3 "style="float:right;" >logout</a> 
        
    </form>
    <table  cellspacing="0" cellpadding="5" class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Email</th>
                <th>โทรศัพท์</th>
                <th>ที่อยู่</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $sql = "SELECT * FROM users";
                $result = $conn->query($sql);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['utel']; ?></td>
                    <td><?php echo $row['uass']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>

</html>