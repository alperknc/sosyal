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

}

