<?php
session_start();
include("db.php");

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password' 
            AND role='$role'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){

        $user = mysqli_fetch_assoc($result);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];

        if($role == "admin"){
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }

    } else {
        $error = "Invalid username, password or role!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="login-container">

    <div class="login-card">

        <h2>Login to QuizMaster</h2>
        <p class="subtitle">Access your account</p>

        <?php if($error != "") { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>

        <form method="POST">

            <input type="text" name="username" placeholder="Enter Username" required>

            <input type="password" name="password" placeholder="Enter Password" required>

            <!-- ROLE SELECTION -->
            <select name="role" required>
                <option value="">Login As</option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>

            <button type="submit" name="login">Login</button>

        </form>

        <p class="bottom-text">
            Don't have an account?
            <a href="register.php">Register</a>
        </p>

        <a href="index.php" class="back">← Back to Home</a>

    </div>

</div>

</body>
</html>