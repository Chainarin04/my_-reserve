<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="th"><head><meta charset="UTF-8"><title>เพิ่มผู้ป่วย</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"></head>
<body class="bg-light container mt-5">
    <div class="card shadow" style="max-width: 600px; margin: auto;">
        <div class="card-header bg-primary text-white"><h4>เพิ่มข้อมูลผู้ป่วย</h4></div>
        <div class="card-body">
            <form action="" method="POST">
                HN: <input type="text" name="hn" class="form-control mb-2" required>
                คำนำหน้า: <select name="prefix" class="form-select mb-2"><option value="นาย">นาย</option><option value="นาง">นาง</option><option value="นางสาว">นางสาว</option></select>
                ชื่อ: <input type="text" name="fname" class="form-control mb-2" required>
                นามสกุล: <input type="text" name="lname" class="form-control mb-2" required>
                เพศ: <select name="gender" class="form-select mb-2"><option value="ชาย">ชาย</option><option value="หญิง">หญิง</option></select>
                วันเกิด: <input type="date" name="dob" class="form-control mb-2" required>
                เบอร์โทร: <input type="text" name="phone" class="form-control mb-3" required>
                <button type="submit" name="submit" class="btn btn-primary w-100">บันทึก</button>
                <a href="index.php" class="btn btn-secondary w-100 mt-2">ยกเลิก</a>
            </form>
        </div>
    </div>
    <?php
    if(isset($_POST['submit'])){
        $sql = "INSERT INTO patients (hn_number, prefix, first_name, last_name, gender, dob, phone) 
                VALUES ('{$_POST['hn']}','{$_POST['prefix']}','{$_POST['fname']}','{$_POST['lname']}','{$_POST['gender']}','{$_POST['dob']}','{$_POST['phone']}')";
        if($conn->query($sql)) { echo "<script>alert('สำเร็จ'); window.location='index.php';</script>"; }
    }
    ?>
</body></html>