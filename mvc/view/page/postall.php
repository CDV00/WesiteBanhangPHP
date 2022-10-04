<?php
$posts=$data['posts'];
?>

<div class="row">
    <div class="card col-md-3 border">
        <?php require_once PATH_TO_MODUL . 'topic.php';?>
    </div>
    <div class="card col-md-9 border">
        <div class="card-header text-center">Tin Tức</div>
        <div class="card-body">
            <?php foreach($posts as $p ){?>
            <a href="<?php echo BASE_URL.'page/showdetail/'.$p['alias'] ?>" class="card-title d-block border text-decoration-none py-2 px-5"><?php echo $p['title']?></a>
            <?php }?>
        </div>
    </div>
</div>