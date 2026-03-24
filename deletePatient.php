<?php
include 'conn.php';
$id = $_GET['id'];
if($conn->query("DELETE FROM patients WHERE id=$id")) {
    echo "<script>alert('ลบข้อมูลสำเร็จ'); window.location='index.php';</script>";
}
?>