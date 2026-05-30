<?php
include("../config/db.php");

$subject = $_GET['sid'];

$res = mysqli_query($conn,
"SELECT * FROM questions WHERE subject_id=$subject ORDER BY RAND()");

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="card">

<h2>Quiz</h2>

<form action="result.php" method="POST">

<?php while($q = mysqli_fetch_assoc($res)) { ?>

    <p><?php echo $q['question']; ?></p>

    <div class="option"><?php echo $q['option1']; ?></div>
    <div class="option"><?php echo $q['option2']; ?></div>
    <div class="option"><?php echo $q['option3']; ?></div>
    <div class="option"><?php echo $q['option4']; ?></div>

<?php } ?>

<button type="submit">Submit Quiz</button>

</form>

</div>

</body>
</html>