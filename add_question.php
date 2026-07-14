<?php
session_start();
include("db.php");

if(!isset($_SESSION['role']) || $_SESSION['role'] != "admin"){
    header("Location: login.php");
    exit();
}

$message = "";

if(isset($_POST['add_question'])){

    $subject = $_POST['subject'];
    $question = $_POST['question'];
    $option1 = $_POST['option1'];
    $option2 = $_POST['option2'];
    $option3 = $_POST['option3'];
    $option4 = $_POST['option4'];
    $answer = $_POST['correct_answer'];

    mysqli_query($conn,"INSERT INTO questions
    (subject_id,question,option1,option2,option3,option4,correct_answer)

    VALUES
    ('$subject','$question','$option1','$option2','$option3','$option4','$answer')");

    header("Location: admin_dashboard.php");
    exit();
}

$subjects = mysqli_query($conn,"SELECT * FROM subjects");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Question</title>
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

<h2>Add Question</h2>

<form method="POST">

<select name="subject" required>

<option value="">Select Subject</option>

<?php
while($row=mysqli_fetch_assoc($subjects)){
?>

<option value="<?php echo $row['subject_id']; ?>">
<?php echo $row['subject_name']; ?>
</option>

<?php } ?>

</select>

<input
type="text"
name="question"
placeholder="Enter Question"
required>

<input
type="text"
name="option1"
placeholder="Option 1"
required>

<input
type="text"
name="option2"
placeholder="Option 2"
required>

<input
type="text"
name="option3"
placeholder="Option 3"
required>

<input
type="text"
name="option4"
placeholder="Option 4"
required>

<select name="correct_answer" required>

<option value="">Correct Answer</option>

<option value="option1">Option 1</option>
<option value="option2">Option 2</option>
<option value="option3">Option 3</option>
<option value="option4">Option 4</option>

</select>

<button
type="submit"
name="add_question">
Add Question
</button>

</form>

</div>

</div>

</body>
</html>