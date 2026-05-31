<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">QuizMaster Admin</div>

    <div class="nav-links">
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="index.php">Home</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

<!-- DASHBOARD CONTENT -->
<div class="dashboard-container">

    <h1>Welcome Admin 👑</h1>
    <p>Manage your quiz system</p>

    <div class="card-grid">

        <div class="card-box">➕ Add Subject</div>
        <div class="card-box">🗑 Delete Subject</div>
        <div class="card-box">➕ Add Question</div>
        <div class="card-box">✏ Update Question</div>
        <div class="card-box">❌ Delete Question</div>

    </div>

</div>

</body>
</html>