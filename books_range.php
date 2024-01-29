<!DOCTYPE html>
<?php $nowdate = date("Y-m-d"); ?>
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
        <input type="date" name="bkin" value="<?php echo $nowdate; ?>" required class="form-control" style="width:30%;"/>
        <label>ถึง</label>
        <input type="date" name="bkout" value="<?php echo $nowdate; ?>" required class="form-control" style="width:30%;"/><br />
        <button type="submit" class="btn btn-success">ตกลง</button>
        <a href="books_list2.php" class="btn btn-secondary">ย้อนกลับ</a>
    </form>
</body>
</html>