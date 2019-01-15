<head>
    <title>Phone_item</title>
    <link rel="stylesheet" href="/public/css/style.css"/>
</head>


    <?php

    if (empty($_GET['id'])){
        header('Location: ' . ROOT . '/views/phones/index.php');
        exit;
    }

    if (!empty($_GET['id'])){ ?>

        <div class="phone_content">
            <input type="hidden" value="<?php echo $_GET['id']?>" id="product_id">

            <div>
                <h1 class="title_item"><?php echo $phonesItem['title']; ?></h1>
<!--                <i class="fa fa-edit" id="edit_phone"></i>-->
            </div>

            <div class="edit_phone">
                Edit
            </div>
            <div id="edit">
                <div class="ed_phone">
                    <button class="delete_phone">Delete</button>
                    <input type="file" name="replaced_photo">
                </div>
            </div>

            <div id="dialog">

            </div>



            <div class="image_item">
                <img src="/public/images/phones/<?php echo $phonesItem['image']; ?>">
            </div>

            <div class="image_description"><h3>About Phone</h3><?php echo $phonesItem['description']; ?></div>
            <div class="price_item">Price: <?php echo $phonesItem['price']; ?> dram</div>

        </div>
        <div>
            <fieldset id="comment_area">
                <legend class="comment_leg">Comments</legend>
            <?php foreach ($phonesComments as $value):?>
                <p><?= $value['comment'] ?> <span class="" style="float: right"><? echo $value['date_time']; ?></span></p>
            <?php endforeach;?>
            </fieldset>

        </div>

        <div class="common_comm">
            <textarea id="comment"></textarea>
            <button id="add_comment">Add Comment</button>
        </div>

<?php  } else {
            echo 'Տվյալ չի գտնվել';
        } ?>

