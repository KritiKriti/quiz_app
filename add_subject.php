<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['add_subject'])){

    $subject = trim($_POST['subject']);

    // Check if subject already exists
    $check = mysqli_query($conn,"SELECT * FROM subjects WHERE subject_name='$subject'");

    if(mysqli_num_rows($check) > 0){

        $message = "Subject already exists!";

    }else{

       mysqli_query($conn, "INSERT INTO subjects(subject_name) VALUES('$subject')");

header("Location: admin_dashboard.php");
exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Subject</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAVBAR -->
<div class="navbar">

    <div class="logo">QuizMaster Admin</div>

    <div class="nav-links">
        <a href="admin_dashboard.php">Dashboard</a>
        <a href="logout.php">Logout</a>
    </div>

</div>

<div class="login-container">

<div class="login-card">

<h2>Add New Subject</h2>

<?php
if($message!=""){
    echo "<p style='color:green; margin-bottom:15px;'>$message</p>";
}
?>

<form method="POST">

<input
type="text"
name="subject"
placeholder="Enter Subject Name"
required>

<button
type="submit"
name="add_subject">
Add Subject
</button>

</form>

</div>

</div>

</body>
</html>