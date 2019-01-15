<?php

return array(
    'home' => 'home/index',
    'login' => 'login/signin',     // actionIndex on LoginController
    'registration' => 'login/registration', // action registration on LoginController
    'profile' => 'login/profile',  // action profile on LoginController
    'logout' => 'logout/logExit',  // actionList on LogoutController
    'phones/([\d]+)' => 'phones/view',  // actionView on PhonesController
    'phones' => 'phones/desc',     // actionDesc on PhonesController
    'addPhone' => 'phones/addPhone',  // actionAdd on PhonesController
    'PhoneAdd' => 'phones/PhoneAdd',  // actionPhoneAdd on PhoneController
    'addComment' => 'phones/addComment',  // actionAddComment on PhonesController
    'seasons' => 'home/season', // actionseason  on HomeController
    'mvc' => 'mvc/index'  //  actionIndex  on MvcController
);
