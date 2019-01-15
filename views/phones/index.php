<div class="content">

    <div class="phones_div">

        <div class="addPhone">
            <a href="/addPhone">Add Phone</a>
        </div>


        <?php foreach ($phonesList as $phonesItem):?>

            <div class="image_post">

                <h3 class="title" id="<?php echo $phonesItem['id'];?>">
                    <a href="/phones/<?php echo $phonesItem['id'];?>">
                        <?php echo $phonesItem['title']; ?>
                    </a>
                </h3>

                <div class="post">
                    <a href="/phones/<?php echo $phonesItem['id'];?>">
                        <img src="/public/images/phones/<?php echo $phonesItem['image'];?>" class="phone_img" alt="" />
                    </a>
                </div>

            </div>
        <?php endforeach;?>
    </div>
</div>


