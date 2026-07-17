<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: login.php");
    exit();
}

// Delete Question
if(isset($_GET['delete'])){
    $id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM questions WHERE question_id='$id'");

    header("Location: manage_question.php");
    exit();
}

// Fetch Questions with Subject Name
$sql = "SELECT questions.*, subjects.subject_name
        FROM questions
        INNER JOIN subjects
        ON questions.subject_id = subjects.subject_id
        ORDER BY question_id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Questions</title>
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

<h1>Manage Questions</h1>

<table border="1" cellpadding="10" cellspacing="0" style="width:95%; margin:auto; background:white;">

<tr>

<th>ID</th>
<th>Subject</th>
<th>Question</th>
<th>Correct Answer</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['question_id']; ?></td>

<td><?php echo $row['subject_name']; ?></td>

<td><?php echo $row['question']; ?></td>

<td><?php echo $row['correct_answer']; ?></td>

<td>

<a href="edit_question.php?id=<?php echo $row['question_id']; ?>">
✏ Edit
</a>

|

<a href="manage_question.php?delete=<?php echo $row['question_id']; ?>"
onclick="return confirm('Delete this question?')">
🗑 Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>