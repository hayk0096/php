<?php

class Phones
{

    /*
     * Returns single phones item with specified id
     * @param integer $id
     */
    public static function getPhonesItemBYId($id)
    {
        // request for DB

        $id = intval($id);

        if ($id){

            $db = db::getConnection();

            $result = $db->query('SELECT * from phones WHERE id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $phonesItem = $result->fetch();

            return $phonesItem;
        }
    }

    public static function getPhoneComments($id){
        $id = intval($id);

        if ($id){

            $db = db::getConnection();

            $result = $db->query('SELECT * from phones p
                  INNER JOIN comments c ON c.product_id = p.id
            WHERE p.id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $phonesItem = $result->fetchAll();

            return $phonesItem;
        }
    }

    /*
     * Returns an array of phones items
     * */
    public static function getPhonesList()
    {
        // Request for DB

        $db = Db::getConnection();

        $phonesList = array();

        $sql = ('SELECT * FROM phones');

        $result = $db->query($sql);

        $i = 0;
        while($row = $result->fetch()){
            $phonesList[$i]['id'] = $row['id'];
            $phonesList[$i]['title'] = $row['title'];
            $phonesList[$i]['price'] = $row['price'];
            $phonesList[$i]['image'] = $row['image'];
            $phonesList[$i]['description'] = $row['description'];
            $i++;
        }

        return $phonesList;
    }

    public static function addNewPhone ($data)
    {

        $title = $data['title'];
        $price = $data['price'];
        $phoneImage = $data['phoneImage'];
        $description = $data['description'];

        $db = Db::getConnection();

        if ($title && $price && $phoneImage && $description){

            $sql = "INSERT INTO `testmvc`.`phones` ( `title`, `price`, `image`, `description`) 
                                VALUES ( '$title', '$price', '$phoneImage', '$description' )";

            $result = $db->query($sql);

            if ($result){
                echo "phone successfully added";
            }else {
                echo "Error";
            }
        }


    }

    public static function addComment($product_id,$comment){
        $db = Db::getConnection();
        try{
            $dateTime = new DateTime();
            $sql = "INSERT INTO comments (product_id,comment,date_time) VALUES (:product_id,:comment,:date_time)";

            $query = $db->prepare($sql);

            $query->execute(array(
                ':product_id' => $product_id,
                ':comment' => $comment,
                ':date_time'=>$dateTime->format('Y-m-d h:i:s')
            ));
            return true;
        }catch (Exception $e){
            return false;
        }
    }
}