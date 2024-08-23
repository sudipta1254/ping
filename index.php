<?php
    require 'functions/functions.php';
    session_start();
    if (isset($_SESSION['user_id'])) {
        header("location:home.php");
    }
    ob_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>mySocial</title>
    <link rel="icon" href="images/icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="resources/main.css">
</head>
<body>
    <h1 class="login-signup-header">mySocial</h1>
    <div class="login-container">
        <h2>Login</h2>
        <form method="post" onsubmit="return validateLogin()">
            <input type="email" name="useremail" id="loginuseremail" placeholder="Email" required>
            <div class="required"></div>
            <input type="password" name="userpass" id="loginuserpass" placeholder="Password" required>
            <div class="required"></div>
            <input type="submit" value="Submit" name="login">
        </form>
        <p class="login-signup">Don't have an account? <a href="signup.php">Signup</a></p>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="resources/main.js"></script>
</body>
</html>

<?php
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
    if (isset($_POST['login'])) {           // Login process
        $useremail = $_POST['useremail'];
        $userpass = md5($_POST['userpass']);
        $query = mysqli_query($conn, "SELECT * FROM users WHERE user_email = '$useremail' AND user_password = '$userpass'");
        if ($query) {
            if (mysqli_num_rows($query) == 1) {
                $row = mysqli_fetch_assoc($query);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['user_name'];
                header("location:home.php");
            } else {
                ?> <script>
                document.getElementsByClassName("required")[0].innerHTML = "Invalid Login Credentials.";
                document.getElementsByClassName("required")[1].innerHTML = "Invalid Login Credentials.";
                </script> <?php
            }
        } else {
            echo mysqli_error($conn);
        }
    }
}
?>