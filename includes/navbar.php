<div class="usernav">
    <?php
        $sql2 = "SELECT COUNT(*) AS count FROM friendship 
                 WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 0";
        $query2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($query2);
    ?>
    <div id="usernav-left">
        <img src="images/icon.svg" alt="icon">
        <em><a href="index.php">mySocial</a></em>
    </div>
    <div class="globalsearch">
        <form method="post" action="search.php" onsubmit="return validateField()"> <!-- Ensure there are no enter escape characters.-->
            <input type="text" placeholder="Search by username/name" name="query" id="query">
            <input type="submit" value="Search" id="querybutton">
        </form>
    </div>
    <ul> <!-- Ensure there are no enter escape characters. -->
        <li>
            <a href="requests.php">Friend Requests (<?php echo $row['count'] ?>)</a>
        </li>
        <li>
            <a href="home.php">Home</a>
        </li>
        <li>
            <a href="profile.php">Profile</a>
        </li>
        <li>
            <a href="friends.php">Friends</a>
        </li>
        <li>
            <a href="logout.php">Log Out</a>
        </li>
    </ul>
</div>

<script>
    <?php
        echo $row['count']
    ?>
    function validateField() {
        var query = $("#query");
        if(!query.val().trim()) {
            query.attr('placeholder', 'Type something!');
            return false;
        }
        return true;
    }
</script>