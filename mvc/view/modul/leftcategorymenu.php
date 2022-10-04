<?php
	$categorymodel = new CategoryModel;
	$cats=$categorymodel->getAll(['trash'=>0,'status'=>1]);

?>


<div class="card">
	<div class="card-header">CATEGORY
	</div>
	<ul class="list-group list-group-flush">
	<?php foreach($cats as $cat){?>
		<li class="list-group-item"><a href="<?php echo BASE_URL;?>product/productByCat/<?php echo $cat['alias'].'/'.LIMIT.'/0';?>" class="text-decoration-none"><?php echo $cat['catName']?></a></li>
	<?php }?>
		</ul>
 </div>