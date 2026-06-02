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

    <a href="quiz.php?subject=Web Technology" class="card-box">💻 Web Technology</a>

    <a href="quiz.php?subject=Database Management System" class="card-box">🗄 DBMS</a>

    <a href="quiz.php?subject=Computer Networks" class="card-box">🌐 Computer Networks</a>

    <a href="quiz.php?subject=Operating System" class="card-box">⚙ Operating System</a>

    <a href="quiz.php?subject=Software Engineering" class="card-box">📊 Software Engineering</a>

    <a href="quiz.php?subject=Computer Graphics" class="card-box">🎨 Computer Graphics</a>

    <a href="quiz.php?subject=Cyber Security" class="card-box">🔐 Cyber Security</a>

    <a href="quiz.php?subject=Mobile Programming" class="card-box">📱 Mobile Programming</a>

    <a href="quiz.php?subject=Data Structures" class="card-box">📚 Data Structures</a>

    <a href="quiz.php?subject=Java Programming" class="card-box">☕ Java Programming</a>

    <a href="quiz.php?subject=Python Programming" class="card-box">🐍 Python Programming</a>

    <a href="quiz.php?subject=Mathematics" class="card-box">📐 Mathematics</a>

</div>

</div>

</body>
</html>