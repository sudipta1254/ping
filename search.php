<?php
    require 'functions/functions.php';
    session_start();
    // Check whether user is logged on or not
    if (!isset($_SESSION['user_id'])) {
        header("location:index.php");
    }
    // Establish Database Connection
    $conn = connect();
?>

<!DOCTYPE html>
<html>
<head>
    <title>mySocial - User Search</title>
    <link rel="stylesheet" href="resources/main.css">
</head>
<body>
    <?php include 'includes/navbar.php'; ?>
    <div class="container">
        <h1>Search Results</h1>
        <?php
            $name = $_POST['query'];
            $sql = "SELECT * FROM users";
            include 'includes/userquery.php';
        ?>
    </div>
</body>
</html>
