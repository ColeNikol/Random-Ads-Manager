<?php
session_start();

// Hardcoded login credentials
$adminUser = "admin";
$adminPass = "pass";

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Validate credentials
    if ($username === $adminUser && $password === $adminPass) {
        $_SESSION['loggedin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        // Redirect back to login form with error
        header("Location: index.php?error=1");
        exit();
    }
}

// If accessed directly, redirect to login form
header("Location: index.php");
exit();
?>
