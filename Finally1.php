<?php
session_start();
include '../all.php';
include 'check_admin.php';

$username = $_SESSION['username'];

$sql = "SELECT name, l_name, role, email FROM users WHERE username = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($name, $l_name, $role, $email);
$stmt->fetch();
$stmt->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_name = $_POST['name'];
    $new_l_name = $_POST['l_name'];
    $new_email = $_POST['email'];

    $update_sql = "UPDATE users SET name = ?, l_name = ?, email = ? WHERE username = ?";
    $update_stmt = $mysqli->prepare($update_sql);
    $update_stmt->bind_param("ssss", $new_name, $new_l_name, $new_email, $username);

    if ($update_stmt->execute()) {
        echo "<script>
            alert('แก้ไขข้อมูลสำเร็จ!');
            window.location.href = 'index_admin.php';
        </script>";
    } else {
        $message = "เกิดข้อผิดพลาดในการแก้ไขข้อมูล.";
    }
    $update_stmt->close();
}

$mysqli->close();
?>