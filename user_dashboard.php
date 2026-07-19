<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != "user"){
    header("Location: login.php");
    exit();
}

$subjects = mysqli_query($conn, "SELECT * FROM subjects ORDER BY subject_name");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">

    <div class="logo">QuizMaster</div>

    <div class="nav-links">
        <a href="user_dashboard.php">Home</a>
        <a href="index.php">Website</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

<div class="dashboard-container">

<h1>Welcome User 🎓</h1>

<p>Select a subject to start your quiz.</p>

<div class="card-grid">

<?php
while($row = mysqli_fetch_assoc($subjects)){
?>

<a href="quiz.php?subject=<?php echo urlencode($row['subject_name']); ?>" class="card-box">

<?php echo $row['subject_name']; ?>

</a>

<?php
}
?>

</div>

</div>

</body>
</html>