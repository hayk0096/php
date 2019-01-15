<?php

class HomeController
{

    public function actionIndex()
    {

        require_once (ROOT . '/views/home.php');
        return true;
    }

    public function actionSeason()
    {
        require_once (ROOT . '/views/seasons.php');
        return true;
    }

}