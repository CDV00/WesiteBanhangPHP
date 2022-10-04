<?php
$currentpost = $data['currentpost'];
//$sameproducts=$data['sameProducts'];


?>
<div class="row">
    <div class="card col-md-3 border">
        <?php require_once PATH_TO_MODUL . 'topic.php';?>
    </div>
    <div class="card col-md-9 border">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h2 class="card-title"><?php echo $currentpost['title'] ?></h2>
            <?php
            //var_dump($currentpost);
            ?>
            <p class="card-text">
                <!-- <h4>ASUS ROG Strix G15 G512-IAL013T – Trải nghiệm thị giác tầm cao</h4> -->
                <?php echo $currentpost['content'] ?>
            <p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>