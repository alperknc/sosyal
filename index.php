<?php
include ("includes/header.php");
?>
    <div class="user_details column">
        <a href="<?php echo $userLoggedIn ?>"><img src="<?php echo $user['profile_pic']; ?>"></a>

        <div class="user_details_left_right">

            <a href="<?php echo $userLoggedIn ?>">
            <?php
                 echo $user['first_name'] . " " . $user['last_name'];
            ?>
            </a>
            <br>
            <?php
            echo "Gönderiler: " . $user['num_posts'] . "<br>";
            echo "Beğeniler: " . $user['num_likes'];
            ?>
        </div>
    </div>

    <div class="main_colmn column">
        <form class="post_form" action="index.php" method="post">
            <textarea name="post_text" id="post_text" placeholder="Ne düşünüyorsun?"></textarea>
            <input type="submit" name="post" id="post_button" value="Gönder">
        </form>
    </div>
</div>
</body>
</html>
