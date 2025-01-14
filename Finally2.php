<?php
session_start();
include '../all.php';
include 'check_admin.php';

if (isset($_GET['id'])) {
    $id_dep = $_GET['id'];

    $sql = "DELETE FROM tb_dep WHERE id_dep = ?";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("s", $id_dep);
        if ($stmt->execute()) {
            $message = "ลบข้อมูลสำเร็จ!";
        } else {
            $message = "เกิดข้อผิดพลาด: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $message = "เกิดข้อผิดพลาดในการเตรียมคำสั่ง: " . $mysqli->error;
    }

    $mysqli->close();

    echo "<script>
        alert('$message');
        window.location.href = 'add_dep.php';
    </script>";
} else {
    header("Location: add_dep.php");
    exit();
}
?>