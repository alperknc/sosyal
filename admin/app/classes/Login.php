<?php
require('config.php');

class Login
{
    private $con;

    public function __construct($con)
    {
        $this->con = $con;
    }

    public function isAdmin() {
        if ($_SERVER['REQUEST_METHOD'] == "POST") :
            if (!preg_match("/^[A-Za-z0-9]/", $_POST['username']))
                exit('<div class="flo-notification alert-error">Geçersiz karakterler.</div>');

            $username = $_POST['username'];
            $password = md5($_POST['password']);

            $check_database_query = mysqli_query($this->con, "select * from users where username='$username' and password='$password'");
            $check_login_query = mysqli_num_rows($check_database_query);

            if ($check_login_query == 1) :

                $row = mysqli_fetch_array($check_database_query);
                if ($row['admin'] == "yes") :
                $username = $row['username'];
                session_start();
                $_SESSION['username'] = $username;
                //header("Location: index.php");
                    echo('<div class="flo-notification alert-success">Giriş Başarılı</div>');
                exit();
                else:
                    exit('<div class="flo-notification alert-error">Giriş yetkin yok </div>');
                endif;
            else :
                exit('<div class="flo-notification alert-error">Geçersiz bilgiler </div>');
            endif;
        endif;
    }

    public function check() {
        session_start();
        if (!isset($_SESSION['username'])) {
            header("Location: login.php");
            exit;
        } else {
            $userexists = false;
            $username = $_SESSION['username'];

            $check_database_query = mysqli_query($this->con, "select * from users where username='$username' and admin='yes'");
            $check_login_query = mysqli_num_rows($check_database_query);

            if ($check_login_query == 1)
                $userexists = true;

            if ($userexists !== true) {
                header("Location: login.php");
                exit;
            }
        }
    }





}