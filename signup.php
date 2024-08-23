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
    <div class="signup-container">
        <h2>Sign Up</h2>
        <form method="post" onsubmit="return validateRegister()">
            <input type="text" name="name" placeholder="Name" required>
            <input type="text" name="username" placeholder="Username" required>
            <div class="required"></div>
            <input type="email" name="useremail" placeholder="Email" required>
            <div class="required"></div>
            <input type="password" name="userpass" placeholder="Password" required>
            <input type="password" name="userpassconfirm" placeholder="Confirm Password" required>
            <select name="usergender" required>
                <option value="M">Male</option>
                <option value="F">Female</option>
            </select>
            <input type="date" name="selectdate" placeholder="Date of Birth" required>
            <textarea name="userabout" placeholder="About"></textarea>
            <input type="submit" value="Create Account" name="register">
        </form>
        <p class="login-signup">Alreaady have an account? <a href="index.php">Login</a></p>
    </div>

    <?php include 'includes/footer.php'; ?>

    <script src="resources/main.js"></script>
</body>

</html>

<?php
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // A form is posted
    if (isset($_POST['register'])) { // Register process
        // Retrieve Data
        $name = $_POST['name'];
        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $userpassword = md5($_POST['userpass']);
        $userbirthdate = $_POST['selectdate'];
        $usergender = $_POST['usergender'];
        $userabout = $_POST['userabout'];
        // Check for Some Unique Constraints
        $query = mysqli_query($conn, "SELECT user_username, user_email FROM users WHERE user_username = '$username' OR user_email = '$useremail'");
        if (mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_assoc($query);
            if ($username == $row['user_username'] && !empty($username)) {
                ?> <script>
                    document.getElementsByClassName("required")[0].innerHTML = "This Nickname already exists.";
                </script> <?php
            }
            if ($useremail == $row['user_email']) {
                ?> <script>
        document.getElementsByClassName("required")[1].innerHTML = "This Email already exists.";
    </script> <?php
            }
            return;
        }
        // Insert Data
        $sql = "INSERT INTO users(user_name, user_username, user_password, user_email, user_gender, user_birthdate, user_about)
VALUES ('$name', '$username', '$userpassword', '$useremail', '$usergender', '$userbirthdate', '$userabout')";
        $query = mysqli_query($conn, $sql);
        if ($query) {
            $query = mysqli_query($conn, "SELECT user_id FROM users WHERE user_email = '$useremail'");
            $row = mysqli_fetch_assoc($query);
            $_SESSION['user_id'] = $row['user_id'];
            header("location:home.php");
        }
    }
}
?>