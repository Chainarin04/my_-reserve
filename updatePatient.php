<?php include 'conn.php'; 
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM patients WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="th"><head><meta charset="UTF-8"><title>แก้ไขผู้ป่วย</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light container mt-5">
    <div class="card shadow" style="max-width: 600px; margin: auto;">
        <div class="card-header bg-warning"><h4>แก้ไขข้อมูลผู้ป่วย</h4></div>
        <div class="card-body">
            <form action="" method="POST">
                ชื่อ: <input type="text" name="fname" class="form-control mb-2" value="<?=$row['first_name']?>" required>
                นามสกุล: <input type="text" name="lname" class="form-control mb-2" value="<?=$row['last_name']?>" required>
                เบอร์โทร: <input type="text" name="phone" class="form-control mb-3" value="<?=$row['phone']?>" required>
                <button type="submit" name="update" class="btn btn-warning w-100">อัปเดต</button>
                <a href="index.php" class="btn btn-secondary w-100 mt-2">ยกเลิก</a>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])){
        $sql = "UPDATE patients SET first_name='{$_POST['fname']}', last_name='{$_POST['lname']}', phone='{$_POST['phone']}' WHERE id=$id";
        if($conn->query($sql)) { echo "<script>alert('อัปเดตแล้ว'); window.location='index.php';</script>"; }
    }
    ?>
</body></html>