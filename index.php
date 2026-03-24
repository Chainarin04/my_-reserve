<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>ระบบผู้ป่วย - reservation_db</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fas fa-hospital"></i> คลินิกของเรา</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link active" href="index.php">จัดการผู้ป่วย</a>
            <a class="nav-link" href="index2.php">รายการจองคิว</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>รายชื่อผู้ป่วย (Patients)</h2>
        <a href="addPatient.php" class="btn btn-primary"><i class="fas fa-plus"></i> เพิ่มผู้ป่วย</a>
    </div>
    <div class="card shadow-sm"><div class="card-body">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr><th>HN</th><th>ชื่อ-นามสกุล</th><th>เพศ</th><th>อายุ</th><th>เบอร์โทร</th><th>จัดการ</th></tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM patients ORDER BY hn_number ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $age = (new DateTime())->diff(new DateTime($row['dob']))->y;
                        echo "<tr>
                            <td><b>{$row['hn_number']}</b></td>
                            <td>{$row['prefix']}{$row['first_name']} {$row['last_name']}</td>
                            <td>{$row['gender']}</td><td>{$age}</td><td>{$row['phone']}</td>
                            <td>
                                <a href='updatePatient.php?id={$row['id']}' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a>
                                <a href='deletePatient.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"ลบผู้ป่วยรายนี้?\")'><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>";
                    }
                } else { echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูล</td></tr>"; }
                ?>
            </tbody>
        </table>
    </div></div>
</div>
</body>
</html>