<?php
require 'config.php';

class Dashboard
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    private function myQuery($con, $query)
    {
        $my_query = mysqli_query($con, $query);
        $row = mysqli_fetch_array($my_query);
        return $row;
    }

    //Total-------------------------------------------------------------------
    public function getUserCount()
    {
        $row = $this->myQuery($this->con, "select COUNT(*) from users");
        echo $row[0];
    }

    public function getPostCount()
    {
        $row = $this->myQuery($this->con, "select COUNT(*) from posts");
        echo $row[0];
    }

    public function getLikeCount()
    {
        $row = $this->myQuery($this->con, "select COUNT(*) from likes");
        echo $row[0];
    }

    public function getCommentCount()
    {
        $row = $this->myQuery($this->con, "select COUNT(*) from comments");
        echo $row[0];
    }

    public function getLastComments() {
        $query = mysqli_query($this->con, "select * from comments ORDER BY id DESC LIMIT 5");
        $str = "";
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $body = $row['post_body'];
            $username = $row['posted_by'];

            $userquery = mysqli_query($this->con, "select * from users where username='$username'");
            $rowuser = mysqli_fetch_array($userquery);
            $userpic = $rowuser['profile_pic'];

            $str .= "      <tr>
                            <td>
                                <img src='../" .$userpic. "' width='44' height='44'>
                            </td>
                            <td> $body </td>
                           
                            
                             <td class='td-actions text-right'>
                              <button type='button' rel='tooltip' title='' class='btn btn-primary btn-link btn-sm' data-original-title='Edit Task'>
                                <i class='material-icons'>edit</i>
                              </button>
                              <button type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Remove'>
                                <i class='material-icons'>close</i>
                              </button>
                            </td>
                        </tr>";
        }
        echo $str;
    }

    public function getLastLikes() {
        $query = mysqli_query($this->con, "select * from likes ORDER BY id DESC LIMIT 5");
        $str = "";
        while ($row = mysqli_fetch_array($query)) {
            $id = $row['id'];
            $username = $row['username'];
            $postid = $row['post_id'];

            $postquery = mysqli_query($this->con, "select * from posts where id='$postid'");
            $rowposts = mysqli_fetch_array($postquery);
            $tolike =$rowposts['added_by'];


            $str .= "      <tr>
                            <td> $id</td>
                            <td> 
                                <a href='../".$username."'>$username</a>
                                <a href='../". $tolike ."'>$tolike</a>
                                 adlı kişinin gönderisini beğendi
                             </td>
                             <td class='td-actions text-right'>
                              <button type='button' rel='tooltip' title='' class='btn btn-primary btn-link btn-sm' data-original-title='Edit Task'>
                                <i class='material-icons'>edit</i>
                              </button>
                              <button type='button' rel='tooltip' title='' class='btn btn-danger btn-link btn-sm' data-original-title='Remove'>
                                <i class='material-icons'>close</i>
                              </button>
                            </td>
                        </tr>";
        }
        echo $str;
    }

}

