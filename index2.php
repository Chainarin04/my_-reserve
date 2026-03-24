<?php include 'conn.php'; ?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>รายการจองคิว - reservation_db</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="index.php"><i class="fas fa-hospital"></i> คลินิกของเรา</a>
        <div class="navbar-nav ms-auto">
            <a class="nav-link" href="index.php">จัดการผู้ป่วย</a>
            <a class="nav-link active" href="index2.php">รายการจองคิว</a>
        </div>
    </div>
</nav>

<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>รายการจองคิว (Reservations)</h2>
        <a href="addReservation.php" class="btn btn-success"><i class="fas fa-calendar-plus"></i> เพิ่มการจอง</a>
    </div>
    <div class="card shadow-sm"><div class="card-body">
        <table class="table table-striped align-middle">
            <thead class="table-dark">
                <tr><th>วันที่-เวลา</th><th>ผู้ป่วย</th><th>แพทย์ (แผนก)</th><th>สถานะ</th><th>จัดการ</th></tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT r.id, r.reservation_date, r.reservation_time, r.status, p.first_name as pf, p.last_name as pl, d.first_name as df, d.specialty 
                        FROM reservations r JOIN patients p ON r.patient_id = p.id JOIN doctors d ON r.doctor_id = d.id 
                        ORDER BY r.reservation_date ASC, r.reservation_time ASC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $date = date('d/m/Y', strtotime($row['reservation_date']));
                        $time = date('H:i', strtotime($row['reservation_time']));
                        echo "<tr>
                            <td><b>{$date}</b> {$time} น.</td>
                            <td>{$row['pf']} {$row['pl']}</td>
                            <td>หมอ{$row['df']} ({$row['specialty']})</td>
                            <td><span class='badge bg-info text-dark'>{$row['status']}</span></td>
                            <td>
                                <a href='updateReservation.php?id={$row['id']}' class='btn btn-sm btn-warning'><i class='fas fa-edit'></i></a>
                                <a href='deleteReservation.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"ลบคิวนี้?\")'><i class='fas fa-trash'></i></a>
                            </td>
                        </tr>";
                    }
                } else { echo "<tr><td colspan='5' class='text-center'>ไม่มีคิวการจอง</td></tr>"; }
                ?>
            </tbody>
        </table>
    </div></div>
</div>
</body>
</html>