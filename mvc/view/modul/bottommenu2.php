<?php
	$linkmodel=new LinkModel;
	$links=$linkmodel->getAll(['trash'=>0,'status'=>1,'position'=>'bottommenu2']);
?>


<div class="col-md-3 text-center text-light" style='margin-top: 50px;'>
<?php foreach ($links as $link) {?>
		<a href="<?php echo BASE_URL.$link['link']?>" class="text-decoration-none text-light"><?php echo $link['title']?></a><br><br>
	<?php } ?>
</div>
