<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_SESSION['username'];
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
}

    $sql = "SELECT password FROM users WHERE username = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($db_password);
    $stmt->fetch();
    $stmt->close();

    if ($current_password === $db_password) {
        $update_sql = "UPDATE users SET password = ? WHERE username = ?";
        $update_stmt = $mysqli->prepare($update_sql);
        $update_stmt->bind_param("ss", $new_password, $username);
    }
?>