<?php
include("db.php");

if(isset($_POST['register'])){

    $u = $_POST['username'];
    $p = $_POST['password'];

    mysqli_query($conn,
    "INSERT INTO users(username,password,role)
    VALUES('$u','$p','user')");

    header("Location: login.php?role=user");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="card">

    <h2>User Registration</h2>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button name="register">Register</button>

    </form>

    <a href="index.php">Back</a>

</div>

</body>
</html>