<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <title>Forum för fårskallar 🐑</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<header>
    <h1><a href="index.php">Forum för fårskallar 🐑</a></h1>
    <nav>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="new_topic.php">Ny tråd</a>
            <a href="logout.php">Logga ut</a>
        <?php else: ?>
            <a href="login.php">Logga in</a>
            <a href="register.php">Registrera</a>
        <?php endif; ?>
    </nav>
</header>
<main>
