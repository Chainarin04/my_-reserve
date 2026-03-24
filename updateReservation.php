<?php include 'conn.php'; 
$id = $_GET['id'];
$row = $conn->query("SELECT * FROM reservations WHERE id=$id")->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="th"><head><meta charset="UTF-8"><title>แก้ไขการจอง</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light container mt-5">
    <div class="card shadow" style="max-width: 600px; margin: auto;">
        <div class="card-header bg-warning"><h4>แก้ไขสถานะการจอง</h4></div>
        <div class="card-body">
            <form action="" method="POST">
                วันที่: <input type="date" name="r_date" class="form-control mb-2" value="<?=$row['reservation_date']?>" required>
                เวลา: <input type="time" name="r_time" class="form-control mb-2" value="<?=$row['reservation_time']?>" required>
                สถานะ: <select name="status" class="form-select mb-3">
                    <option value="pending" <?=($row['status']=='pending')?'selected':''?>>รอการยืนยัน (Pending)</option>
                    <option value="confirmed" <?=($row['status']=='confirmed')?'selected':''?>>ยืนยันแล้ว (Confirmed)</option>
                    <option value="completed" <?=($row['status']=='completed')?'selected':''?>>เสร็จสิ้น (Completed)</option>
                    <option value="cancelled" <?=($row['status']=='cancelled')?'selected':''?>>ยกเลิก (Cancelled)</option>
                </select>
                <button type="submit" name="update" class="btn btn-warning w-100">บันทึกการแก้ไข</button>
                <a href="index2.php" class="btn btn-secondary w-100 mt-2">ยกเลิก</a>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['update'])){
        $sql = "UPDATE reservations SET reservation_date='{$_POST['r_date']}', reservation_time='{$_POST['r_time']}', status='{$_POST['status']}' WHERE id=$id";
        if($conn->query($sql)) { echo "<script>alert('อัปเดตคิวแล้ว'); window.location='index2.php';</script>"; }
    }
    ?>
</body></html>