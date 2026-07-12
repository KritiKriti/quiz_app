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

<a href="add_subject.php" class="card-box">
➕ Add Subject
</a>

<a href="manage_subject.php" class="card-box">
📚 Manage Subjects
</a>

<a href="add_question.php" class="card-box">
➕ Add Question
</a>

<a href="manage_question.php" class="card-box">
✏ Manage Questions
</a>

</div>
</div>

</body>
</html>