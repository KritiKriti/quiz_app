<?php
session_start();

if(!isset($_SESSION['role']) || $_SESSION['role'] != "user"){
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">QuizMaster</div>

    <div class="nav-links">
        <a href="user_dashboard.php">Home</a>
        <a href="index.php">Website</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

<!-- MAIN CONTENT -->
<div class="dashboard-container">

    <h1>Welcome User 🎓</h1>
    <p>Select a subject to start your quiz</p>

    <div class="card-grid">

        <div class="card-box">📘 Mathematics</div>
        <div class="card-box">🔬 Science</div>
        <div class="card-box">💻 Computer</div>
        <div class="card-box">🌍 General Knowledge</div>
        <div class="card-box">💻 Web Technology</div>
    <div class="card-box">🗄 Database Management System</div>
    <div class="card-box">📱 Mobile Programming</div>
    <div class="card-box">🧠 Computer Graphics</div>
    <div class="card-box">🔐 Cyber Security</div>
    <div class="card-box">🌐 Computer Networks</div>
    <div class="card-box">⚙ Operating System</div>
    <div class="card-box">📊 Software Engineering</div>


    </div>

</div>

</body>
</html>