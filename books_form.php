<!DOCTYPE html>
<?php
require 'mysql/config.php';
$bkin = (isset($_GET['bkin'])) ? $_GET['bkin'] : date("Y-m-d");
$bkout = (isset($_GET['bkout'])) ? $_GET['bkout'] : date("Y-m-d");
$bkcust = (isset($_GET['bkcust'])) ? $_GET['bkcust'] : "";
$bktel = (isset($_GET['bktel'])) ? $_GET['bktel'] : "";
$q = (int) (isset($_GET['q'])) ? $_GET['q'] : 0;
$days = (int) date_diff(date_create($bkin), date_create($bkout))->format('%R%a');

if ($days < 1) {
    echo "<script>window.location.replace('books_range.php');</script>";
    exit();
}

if (isset($_GET['rmid'])) {
    $rmid = $_GET['rmid'];
    $bkstatus = 0;
    require 'books_status.php';
}

if ($q > 0) {
    $kw = " AND roomtype.rmtype='$q'";
} else {
    $kw = "";
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <title>ระบบจองห้องพัก</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body class="container p-5">
    <h1>ระบบจองห้องพัก</h1>
    <hr><br />
    <form action="books_form.php" method="GET">
        <label>เข้าพักวันที่</label>
        <input type="date" name="bkin" value="<?php echo $bkin; ?>" readonly class="form-control" />
        <label>ถึง</label>
        <input type="date" name="bkout" value="<?php echo $bkout; ?>" readonly class="form-control" /><br />
        <input type="hidden" name="bkcust" value="<?php echo $bkcust; ?>" />
        <input type="hidden" name="bktel" value="<?php echo $bktel; ?>" />
        <select name="q" id="q" class="form-select">
            <option value="0">ทั้งหมด</option>
            <?php
            $sql = "SELECT * FROM roomtype ORDER BY rmtype ASC";
            $result = $conn->query($sql);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
                <option value="<?php echo $row['rmtype']; ?>"><?php echo $row['tpname']; ?></option>
            <?php } ?>
        </select>
        <button type="submit" class="btn btn-outline-secondary mt-3">ค้นหา</button>
    </form><br />
    <form action="books_insert.php" method="POST">
        <input type="hidden" name="bkin" value="<?php echo $bkin; ?>" />
        <input type="hidden" name="bkout" value="<?php echo $bkout; ?>" />
        <!-- <label>ผู้จอง : </label> -->
        <!-- <input type="text" name="bkcust" value="<?php echo $bkcust; ?>" required /><br/> -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">ผู้จอง</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="ชื่อ-นามสกุล" name="bkcust" value="<?php echo $bkcust; ?>" required>
        </div>
        <!-- <label>โทรศัพท์ : </label>
            <input type="text" name="bktel" value="<?php echo $bktel; ?>" required /><br/> -->
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">โทรศัพท์</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="เบอร์โทรศัพท์" name="bktel" value="<?php echo $bktel; ?>">
        </div>
        <label>เลือกห้อง : </label>
        <select name="rmid" size="7" required class="form-select" multiple aria-label="Multiple select example">
            <?php
            $sql = "SELECT * FROM rooms LEFT JOIN roomtype ON rooms.rmtype = roomtype.rmtype "
                . "WHERE rmid NOT IN (SELECT rmid FROM books WHERE bkstatus > '0' AND bkstatus < '3' "
                . "AND ((bkin >= '$bkin' AND bkin < '$bkout')OR (bkin < '$bkin'AND bkout > '$bkin')))"
                . $kw;
            $result = $conn->query($sql);
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
            ?>
                <option value="<?php echo $row['rmid']; ?>">
                    <?php echo $row['rmid']; ?>&nbsp;
                    <?php echo $row['tpname']; ?>&nbsp;
                    <?php echo number_format($row['rmprice'], 0); ?>
                </option>
            <?php } ?>
        </select><br />
        <button type="submit" class="btn btn-outline-success my-3 ">บันทึก</button>
    </form>
    <?php require 'books_room.php'; ?>
    <a href="books_list.php" class="btn btn-outline-secondary my-1 ">ย้อนกลับ</a>
    <script>
        document.getElementById('q').value = "<?php echo $q; ?>";
    </script>
</body>

</html>