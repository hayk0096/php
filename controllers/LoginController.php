<?php

include_once ROOT . '/models/login.php';

class LoginController
{

    public function actionRegistration()
    {
        $data = [
            'f_name'  => isset($_POST['first_name']) ? $_POST['first_name'] : '',
            'l_name'  => isset($_POST['last_name']) ? $_POST['last_name'] : '',
            'email'   => isset($_POST['email']) ? $_POST['email'] : '',
            'gender'  => isset($_POST['gender']) ? $_POST['gender'] : '',
            'username' => isset($_POST['username']) ? $_POST['username'] : '',
            'password' => isset($_POST['password']) ? $_POST['password'] : '',
        ];

        $userReg = array();
        $userReg = Login::register($data);

        require_once (ROOT . '/views/user/registration.php');
        return true;
        //        $userReg = $login->register($data);
//
//        if(isset($userReg['success'])){
//
//        }else{
//            echo $userReg['error'];
//        }

    }


    public function actionSignin()
    {
        require_once (ROOT . '/views/user/login.php');
        return true;
    }

    public function actionProfile()
    {
        $user = [
            'username' => isset($_POST['username']) ? $_POST['username'] : '',
            'password' => isset($_POST['password']) ? $_POST['password'] : '',
        ];

        $getuser = array();
        $getuser = Login::getUser($user);

    }
}