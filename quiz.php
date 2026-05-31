<?php
include("db.php");

$subject = $_GET['subject'] ?? '';

$sql = "SELECT * FROM questions 
        WHERE subject_id = (
            SELECT id FROM subjects WHERE subject_name='$subject'
        )
        ORDER BY RAND()
        LIMIT 10";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="quiz-container">

    <h2><?php echo $subject; ?> Quiz</h2>

    <form action="result.php" method="POST">

        <?php $qno = 1; while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="question-box">

                <p>
                    <?php echo $qno . ". " . $row['question']; ?>
                </p>

                <label><input type="radio" name="q<?php echo $row['id']; ?>" value="A"> <?php echo $row['option_a']; ?></label><br>

                <label><input type="radio" name="q<?php echo $row['id']; ?>" value="B"> <?php echo $row['option_b']; ?></label><br>

                <label><input type="radio" name="q<?php echo $row['id']; ?>" value="C"> <?php echo $row['option_c']; ?></label><br>

                <label><input type="radio" name="q<?php echo $row['id']; ?>" value="D"> <?php echo $row['option_d']; ?></label>

            </div>

        <?php $qno++; } ?>

        <button type="submit">Submit Quiz</button>

    </form>

</div>

</body>
</html>