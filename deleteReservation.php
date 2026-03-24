<?php
include 'conn.php';
$id = $_GET['id'];
if($conn->query("DELETE FROM reservations WHERE id=$id")) {
    echo "<script>alert('ลบคิวจองสำเร็จ'); window.location='index2.php';</script>";
}
?>