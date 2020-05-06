<?php

$con = mysqli_connect("localhost","root","","social");
$con->set_charset("utf8");

class Functions {
    private $con;

    public function __construct($con){
        $this->con = $con;
    }

    private function myQuery($con, $query) {
        $my_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($my_query);
        return $row;
    }

    //Total-------------------------------------------------------------------
    public function getUserCount() {
        $row = $this->myQuery($this->con, "select COUNT(*) from users");
        echo $row[0];
    }
    public function getPostCount() {
        $row = $this->myQuery($this->con, "select COUNT(*) from posts");
        echo $row[0];
    }

    public function getLikeCount() {
        $row = $this->myQuery($this->con, "select COUNT(*) from likes");
        echo $row[0];
    }

    public function getCommentCount() {
        $row = $this->myQuery($this->con, "select COUNT(*) from comments");
        echo $row[0];
    }
    //--------------------------------------------------------------------------------
    public function getUsers() {
        $my_query = mysqli_query($this->con, "select * from users");

        while ($row = mysqli_fetch_array($my_query)):
            $id = $row['id'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $signup_datey = $row['signup_date'];
            $profile_pic = $row['profile_pic'];
            $num_posts = $row['num_posts'];
            $num_likes = $row['num_likes'];
            $user_closed = $row['user_closed'];
            $friend_array = $row['friend_array'];

            echo $first_name . " " . $last_name . "<br>";

        endwhile;
    }

    public function getUser($user) {
        $row = $this->myQuery($this->con, "select * from users where id=$user");
        $id = $row['id'];
        $first_name = $row['first_name'];
        $last_name = $row['last_name'];
        $email = $row['email'];
        $signup_datey = $row['signup_date'];
        $profile_pic = $row['profile_pic'];
        $num_posts = $row['num_posts'];
        $num_likes = $row['num_likes'];
        $user_closed = $row['user_closed'];
        $friend_array = $row['friend_array'];

        echo $first_name . " " . $last_name . "<br>";
    }

}

