<?php

class Post
{
    private $user_obj;
    private $con;

    public function __construct($con, $user)
    {
        $this->con = $con;
        $this->user_obj = new User($con, $user);
    }

    public function submitPost($body, $user_to)
    {
        $body = strip_tags($body);
        $body = mysqli_real_escape_string($this->con, $body);
        $check_empty = preg_replace('/\s+/', '', $body); //boşluk silme

        if ($check_empty != "") :
            $date_added = date("Y-m-d H:i:s");
            $added_by = $this->user_obj->getUsername();

            if ($user_to == $added_by) :
                $user_to = "none";
            endif; //Kendi profiline yazıyorsa

            // Post ekleme
            $query = mysqli_query($this->con, "insert into posts values('', '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
            $returned_id = mysqli_insert_id($this->con);

            // Bildirim

            // Post güncelle
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->con, "update users set num_posts='$num_posts' where username='$added_by'");


         endif;  //Post boş değilse
    }

    public function loadPostsFirends()
    {
        $str = "";
        $data = mysqli_query($this->con, "select * from posts where deleted='no' order by id desc");

        while ($row = mysqli_fetch_array($data)):
            $id = $row['id'];
            $body = $row['body'];
            $added_by = $row['added_by'];
            $date_time = $row['date_added'];

            //Post birine gönderilmezse
            if($row['user_to'] == "none") {
                $user_to = "";
            }
            else {
                $user_to_obj = new User($con, $row['user_to']);
                $user_to_name = $user_to_obj->getFirstAndLastName();
                $user_to = "to <a href='" . $row['user_to'] ."'>" . $user_to_name . "</a>";
            }



        endwhile;
    }

}