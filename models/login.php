<?php

class Login
{

    public static function register($data)
    {

        $f_name = $data['f_name'];
        $l_name = $data['l_name'];
        $email = $data['email'];
        $gender = $data['gender'];
        $username = $data['username'];
        $password = $data['password'];

        $db = Db::getConnection();

        // register to database
        if ($username && $password) {

            $sql = "INSERT INTO `users` ( `firstname`, `lastName`, `email`, `gender`, `username`, `password`) 
                          VALUES ( '$f_name' , '$l_name' , '$email' , '$gender' , '$username' , '$password' )";

            $result = $db->query($sql);

            if ($result) {
                echo 'You are successfully register';
                header('Location: /login.php');
                exit;
            }else{
                echo 'chlcec';
            }

//            if ($result) {
//
//                return ['success'=>'You are successfully register'];
//                header('Location: /login');
//                exit();
//            } else {
//                return ['error'=>'Error: You are not registered'];
//            }
        }
        return false;
    }

    public static function getUser($user)
    {
        $array = ['name'=>'valod','surname'=>'pogos'];
        echo json_encode($array);

        $username = $user['username'];
        $password = $user['password'];

        // request for db
        $db = Db::getConnection();

        $sql = "SELECT * FROM `users` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $user_info = $result->fetch();

        if ($user_info) {
            echo '<h1>Your Profile</h1>';
            require_once( ROOT . '/views/user/profile.php');
        } else {
            echo "Error: Username or Password was wrong";
            require_once ROOT . '/views/user/login.php';
//            header('Location /login');
//            exit();
        }

    }
    public static function getUserById($userId)
    {

        $userId = intval($userId);

        if ($userId)
        {
            // request for db
            $db = Db::getConnection();

            $sql = "SELECT * FROM `users` WHERE id= " . $userId ;
            $result = $db->query($sql);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $userItem = $result->fetch();

            return $userItem;
        }

    }


}