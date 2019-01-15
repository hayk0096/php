<?php

class MvcController
{

    public function actionIndex()
    {
        require_once (ROOT . '/views/mvc.php');
        return true;
    }
}