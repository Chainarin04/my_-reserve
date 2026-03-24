<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="th"><head><meta charset="UTF-8"><title>เพิ่มการจอง</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light container mt-5">
    <div class="card shadow" style="max-width: 600px; margin: auto;">
        <div class="card-header bg-success text-white"><h4>เพิ่มคิวการจอง</h4></div>
        <div class="card-body">
            <form action="" method="POST">
                เลือกผู้ป่วย: <select name="patient_id" class="form-select mb-2" required>
                    <?php $p=$conn->query("SELECT * FROM patients"); while($r=$p->fetch_assoc()) echo "<option value='{$r['id']}'>{$r['first_name']} {$r['last_name']}</option>"; ?>
                </select>
                เลือกแพทย์: <select name="doctor_id" class="form-select mb-2" required>
                    <?php $d=$conn->query("SELECT * FROM doctors"); while($r=$d->fetch_assoc()) echo "<option value='{$r['id']}'>หมอ{$r['first_name']} ({$r['specialty']})</option>"; ?>
                </select>
                วันที่: <input type="date" name="r_date" class="form-control mb-2" required>
                เวลา: <input type="time" name="r_time" class="form-control mb-3" required>
                <button type="submit" name="submit" class="btn btn-success w-100">บันทึกการจอง</button>
                <a href="index2.php" class="btn btn-secondary w-100 mt-2">ยกเลิก</a>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $sql = "INSERT INTO reservations (patient_id, doctor_id, reservation_date, reservation_time, status) 
                VALUES ('{$_POST['patient_id']}','{$_POST['doctor_id']}','{$_POST['r_date']}','{$_POST['r_time']}','pending')";
        if($conn->query($sql)) { echo "<script>alert('จองคิวสำเร็จ'); window.location='index2.php';</script>"; }
    }
    ?>
</body></html>