<?php
session_start();
if (!isset($_SESSION['cusArr1']) && isset($_COOKIE['remember_me'])) {
    $token = $_COOKIE['remember_me'];
    $stmt = $con->prepare("SELECT * FROM customer WHERE cusToken = ? AND tokenExp > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        $_SESSION['cusArr1'] = $userData;
    }
    $stmt->close();
}
?>