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

    /*  public function submitPost($body, $user_to) {
          $body = strip_tags($body); //removes html tags
          $body = mysqli_real_escape_string($this->con, $body);
          $check_empty = preg_replace('/\s+/', '', $body); //Deltes all spaces

          if($check_empty != "") {


              //Current date and time
              $date_added = date("Y-m-d H:i:s");
              //Get username
              $added_by = $this->user_obj->getUsername();

              //If user is on own profile, user_to is 'none'
              if($user_to == $added_by) {
                  $user_to = "none";
              }

              //insert post
              $query = mysqli_query($this->con, "INSERT INTO posts VALUES('', '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
              $returned_id = mysqli_insert_id($this->con);

              //Insert notification

              //Update post count for user
              $num_posts = $this->user_obj->getNumPosts();
              $num_posts++;
              $update_query = mysqli_query($this->con, "UPDATE users SET num_posts='$num_posts' WHERE username='$added_by'");

          }
      }  */


    public function loadPostsFirends($data, $limit)
    {
        $page = $data['page'];
        $userLoggedIn = $this->user_obj->getUsername();

        if ($page == 1)
            $start = 0;
        else
            $start = ($page -1) * $limit;


        $str = "";
        $data_query = mysqli_query($this->con, "select * from posts where deleted='no' order by id desc");

        if (mysqli_num_rows($data_query) > 0) {

            $num_iterations = 0;
            $count = 1;

            while ($row = mysqli_fetch_array($data_query)):
                $id = $row['id'];
                $body = $row['body'];
                $added_by = $row['added_by'];
                $date_time = $row['date_added'];

                //Post birine gönderilmezse
                if ($row['user_to'] == "none") {
                    $user_to = "";
                } else {
                    $user_to_obj = new User($con, $row['user_to']);
                    $user_to_name = $user_to_obj->getFirstAndLastName();
                    $user_to = " dan <a href='" . $row['user_to'] . "'>" . $user_to_name . "</a>";
                }

                //Yollanın hesap açıkmı
                $added_by_obj = new User($this->con, $added_by);
                if ($added_by_obj->isClosed()) :
                    continue;
                endif;

                if ($num_iterations++ < $start)
                    continue;

                // 10 gönderi yükleyip dur
                if ($count > $limit) {
                    break;
                }else{
                    $count++;
                }

                $user_details_query = mysqli_query($this->con, "select first_name, last_name, profile_pic from users where username='$added_by'");
                $user_row = mysqli_fetch_array($user_details_query);
                $first_name = $user_row['first_name'];
                $last_name = $user_row['last_name'];
                $profile_pic = $user_row['profile_pic'];

                //Timeframe
                $date_time_now = date("Y-m-d H:i:s");
                $start_date = new DateTime($date_time); //Gönderilme saati
                $end_date = new DateTime($date_time_now); //Şuanki saat
                $interval = $start_date->diff($end_date); //Fark
                if ($interval->y >= 1) {
                    if ($interval == 1)
                        $time_message = $interval->y . " yıl önce"; //1 yıl önce
                    else
                        $time_message = $interval->y . " yul önce"; //1+ yıl önce
                } else if ($interval->m >= 1) {
                    if ($interval->d == 0) {
                        $days = " önce";
                    } else if ($interval->d == 1) {
                        $days = $interval->d . " gün önce";
                    } else {
                        $days = $interval->d . " önce";
                    }


                    if ($interval->m == 1) {
                        $time_message = $interval->m . " ay" . $days;
                    } else {
                        $time_message = $interval->m . " ay" . $days;
                    }

                } else if ($interval->d >= 1) {
                    if ($interval->d == 1) {
                        $time_message = "Dün";
                    } else {
                        $time_message = $interval->d . " gün önce";
                    }
                } else if ($interval->h >= 1) {
                    if ($interval->h == 1) {
                        $time_message = $interval->h . " saat önce";
                    } else {
                        $time_message = $interval->h . " saat önce";
                    }
                } else if ($interval->i >= 1) {
                    if ($interval->i == 1) {
                        $time_message = $interval->i . " dakika önce";
                    } else {
                        $time_message = $interval->i . " dakika önce";
                    }
                } else {
                    if ($interval->s < 30) {
                        $time_message = "Şimdi";
                    } else {
                        $time_message = $interval->s . " saniye önce";
                    }
                }

                $str .= "<div class='status_post'>
                                    <div class='post_profile_pic'>
                                        <img src='$profile_pic' width='50'>
                                    </div>
    
                                    <div class='posted_by' style='color:#ACACAC;'>
                                        <a href='$added_by'> $first_name $last_name </a> $user_to &nbsp;&nbsp;&nbsp;&nbsp;$time_message
                                    </div>
                                    <div id='post_body'>
                                        $body
                                        <br>
                                    </div>
    
                                </div>
                                <hr>";


            endwhile;

            if ($count > $limit)
                $str .= "<input type='hidden' class='nextPage' value='" . ($page +1) . "'>
                          <input type='hidden' class='noMorePosts' value='false'>";
            else
                $str .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: center'>Başka bir şey yok</p>";
        }
        echo $str;
    }

}