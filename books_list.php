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
    <title>ระบบจองห้องพัก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body class="container p-5  ">
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
    <table border="1" cellspacing="0" cellpadding="5" class="table table-hover">
        <thead>
            <tr>
                <th>จัดการ</th>
                <th>ID</th>
                <th>เลขที่ห้อง</th>
                <th>ประเภท</th>
                <th>ผู้จอง</th>
                <th>โทรศัพท์</th>
                <th>วันเข้า</th>
                <th>วันออก</th>
                <th>จำนวนวัน</th>
                <!-- <th>ค่าที่พัก</th> -->
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT *FROM books "
                . "LEFT JOIN rooms ON books.rmid=rooms.rmid "
                . "LEFT JOIN roomtype ON rooms.rmtype=roomtype.rmtype "
                . "WHERE books.bkin BETWEEN '$stdate' AND '$endate' AND books.bkstatus = '1' "
                . "ORDER BY books.bkin ASC,books.bkcust ASC,books.rmid ASC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $days = (int) date_diff(date_create($row['bkin']), date_create($row['bkout']))->format('%R%a');
                $sumprice = $days * (int) $row['rmprice'];
            ?>
                <tr>
                    <td>
                        <a href="javascript:bookstatus ('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>',0)" class="btn btn-danger">cancel</a>
                        <a href="javascript:bookstatus ('<?php echo $row['rmid']; ?>','<?php echo $row['bkin']; ?>',2)" class="btn btn-primary">check in</a>
                    </td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['rmid']; ?></td>
                    <td><?php echo $row['tpname']; ?></td>
                    <td><?php echo $row['bkcust']; ?></td>
                    <td><?php echo $row['bktel']; ?></td>
                    <td><?php echo date_format(date_create($row['bkin']), "d-m-Y"); ?></td>
                    <td><?php echo date_format(date_create($row['bkout']), "d-m-Y"); ?></td>
                    <td ><?php echo $days; ?></td>
                    <!-- <td ><?php echo number_format($sumprice, 0); ?></td> -->
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script>
        var vurl = "books_list.php?stdate=<?php echo $stdate; ?>&endate=<?php echo $endate; ?>";
        function bookstatus(v1, v2, v3) {
            var v4 = vurl += "&rmid=" + v1 + "&bkin=" + v2 + "&bkstatus=" + v3;
            window.location.replace(v4);
        }
    </script>
    
</body>

</html>