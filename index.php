<!DOCTYPE html>
<html>
<head>
    <title>MVC</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>

<body>
<?php

   /*
    * Common settings - Общие настройки
    */
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    /*
     *  Connecting  system files - Подключение файлов системы
     */
    define('ROOT', dirname(__FILE__));
    require_once (ROOT. '/components/router.php');
    require_once (ROOT. '/components/db.php');
//including header page
include_once ('views/tiles/header.php');

?>

<div class="content">
    <?php

    /*
    * Call Router - Вызов Router
    */
    $router = new Router();
    $router->run();

    ?>

</div>

<?php

//including footer page
include_once('views/tiles/footer.php');

?>