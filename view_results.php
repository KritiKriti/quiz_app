<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: login.php");
    exit();
}

$sql = "SELECT
        results.result_id,
        users.username,
        subjects.subject_name,
        results.score,
        results.total_questions,
        results.taken_at

        FROM results

        INNER JOIN users
        ON results.user_id = users.id

        INNER JOIN subjects
        ON results.subject_id = subjects.subject_id

        ORDER BY results.taken_at DESC";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Results</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="navbar">

<div class="logo">QuizMaster Admin</div>

<div class="nav-links">
<a href="admin_dashboard.php">Dashboard</a>
<a href="logout.php">Logout</a>
</div>

</div>

<div class="dashboard-container">

<h1>Student Quiz Results</h1>

<table border="1" cellpadding="10" cellspacing="0"
style="width:90%;margin:auto;background:white;">

<tr>

<th>Result ID</th>
<th>Username</th>
<th>Subject</th>
<th>Score</th>
<th>Total Questions</th>
<th>Date</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['result_id']; ?></td>

<td><?php echo $row['username']; ?></td>

<td><?php echo $row['subject_name']; ?></td>

<td><?php echo $row['score']; ?></td>

<td><?php echo $row['total_questions']; ?></td>

<td><?php echo $row['taken_at']; ?></td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>