<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$subjects = mysqli_query($conn,"SELECT * FROM subjects");

$q = mysqli_query($conn,"SELECT * FROM questions WHERE question_id='$id'");
$row = mysqli_fetch_assoc($q);

if(isset($_POST['update'])){

    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['correct_answer'];

    mysqli_query($conn,"UPDATE questions SET

    subject_id='$subject',
    question='$question',
    option1='$option1',
    option2='$option2',
    option3='$option3',
    option4='$option4',
    correct_answer='$answer'

    WHERE question_id='$id'");

    header("Location: manage_question.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Question</title>
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

<div class="login-container">

<div class="login-card">

<h2>Edit Question</h2>

<form method="POST">

<select name="subject" required>

<?php
while($s=mysqli_fetch_assoc($subjects)){
?>

<option
value="<?php echo $s['subject_id'];?>"

<?php
if($row['subject_id']==$s['subject_id']) echo "selected";
?>

>

<?php echo $s['subject_name']; ?>

</option>

<?php } ?>

</select>

<input
type="text"
name="question"
value="<?php echo $row['question']; ?>"
required>

<input
type="text"
name="option1"
value="<?php echo $row['option1']; ?>"
required>

<input
type="text"
name="option2"
value="<?php echo $row['option2']; ?>"
required>

<input
type="text"
name="option3"
value="<?php echo $row['option3']; ?>"
required>

<input
type="text"
name="option4"
value="<?php echo $row['option4']; ?>"
required>

<select name="correct_answer">

<option value="option1" <?php if($row['correct_answer']=="option1") echo "selected"; ?>>Option 1</option>

<option value="option2" <?php if($row['correct_answer']=="option2") echo "selected"; ?>>Option 2</option>

<option value="option3" <?php if($row['correct_answer']=="option3") echo "selected"; ?>>Option 3</option>

<option value="option4" <?php if($row['correct_answer']=="option4") echo "selected"; ?>>Option 4</option>

</select>

<button type="submit" name="update">
Update Question
</button>

</form>

</div>

</div>

</body>
</html>