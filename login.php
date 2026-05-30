<?php
session_start();
include("config/db.php");

$role = $_GET['role'] ?? 'user';

if(isset($_POST['login'])){

    $u = $_POST['username'];
    $p = $_POST['password'];
    $r = $_POST['role'];

    $res = mysqli_query($conn,
    "SELECT * FROM users WHERE username='$u' AND password='$p' AND role='$r'");

    if(mysqli_num_rows($res) > 0){

        $row = mysqli_fetch_assoc($res);

        $_SESSION['id'] = $row['id'];
        $_SESSION['role'] = $row['role'];

        if($r == 'admin'){
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
    } else {
        echo "<script>alert('Invalid Login');</script>";
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

<div class="card">

    <h2><?php echo strtoupper($role); ?> LOGIN</h2>

    <form method="POST">

        <input type="hidden" name="role" value="<?php echo $role; ?>">

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button name="login">Login</button>

    </form>

    <a href="index.php">Back</a>

</div>

</body>
</html>