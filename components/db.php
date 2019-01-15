<?php

class Db
{

    public static function getConnection()
    {
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        if ($db->errorCode()){
            die("Connection failed: " . $db->errorInfo());
        }

        return $db;
    }
}
//
//$ip = $_SERVER['REMOTE_ADDR'];
//
//$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
//if($details->region == 'Kotayq' || $details->region == 'Kotayk'){
//    echo 'this website not available this region';
//}
//
//
//
//require_once('./app/Mage.php');
//Mage::app();
//
//$ip = $_SERVER['REMOTE_ADDR'];
//
//$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
//
//if($details->ip == '37.186.124.177'){
//
//    echo Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_WEB);
//}
//
//if($details->region == 'Shirak'){
//    echo 'Website not available for this region';
//}