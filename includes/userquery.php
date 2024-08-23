<?php
    $query = mysqli_query($conn, $sql);
    if(!$query){
        echo mysqli_error($conn);
    }
    $width = $height= '168px';

    while ($row = mysqli_fetch_assoc($query)) {
        if ($row['user_name'] == $name || $row['user_username'] == $name) {
            echo '<div class="userquery">';
            include 'includes/profile_picture.php';
            echo '<br>';
            echo '<a class="profilelink" href="profile.php?id=' . $row['user_id'] .'">' . $row['user_name'] . '<a>';
            echo '</div>';
            echo '<br>';
            return;
        }
    }
    // User not found
    echo '<div class="userquery">';
    echo 'We couldn\'t find any results for these keywords: ' . $name;
    echo '<br><br>';
    echo '</div>';
