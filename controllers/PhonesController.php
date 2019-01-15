<?php

include_once ROOT . '/models/phones.php';

class PhonesController
{

    public function actionDesc()
    {
        $phonesList = array();
        $phonesList = Phones::getPhonesList();

        require_once (ROOT.'/views/phones/index.php');
        return true;
    }

    public function actionView()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if ($id) {
            $phonesItem = Phones::getPhonesItemBYId($id);
            $phonesComments = Phones::getPhoneComments($id);
            require_once(ROOT . '/views/phones/view.php');
        }
        return true;
    }

    public function actionaddPhone()
    {
        require_once(ROOT . '/views/phones/addPhone.php');
    }

    public function actionPhoneAdd()
    {
        $data = [
            'title'  => isset($_POST['title']) ? $_POST['title'] : '',
            'price'   => isset($_POST['price']) ? $_POST['price'] : '',
            'phoneImage'  => isset($_FILES['phoneImage']) ? $_FILES['phoneImage'] : '',
            'description'  => isset($_POST['description']) ? $_POST['description'] : '',
        ];

        $userPhone = array();
        $userPhone = Phones::addNewPhone($data);
    }

    public function actionAddComment(){
        if($_POST['ajax']){
            $comment = $_POST['comment'];
            $product_id = $_POST['product_id'];
            if(($comment && $comment != '') && ($product_id && $product_id != '')){

                    $result = Phones::addComment($product_id,$comment);
                    echo json_encode(array('status'=>$result));die;

            }
        }
    }
}