<?php
	$currentproduct=$data['currentproduct'];
	$sameproducts=$data['sameProducts'];
	

?>







<div class="row">
    <div class="card mb-3">
	    <div class="row g-0">
		    <div class="col-md-4">
			    <img src="<?php echo BASE_URL; ?>public/upload/<?php echo $currentproduct['Image']?>" class=img-fluid alt="hinSP">
            </div>
	        <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $currentproduct['productName']?></h5>

                    <div><?php echo $currentproduct['Detail']?></div>
					<br>
					<?php if($currentproduct['salePrice']!='') {?>
						<span class="text-decoration-line-through text-secondary d-inline-block text-truncate" style="font-size: 110%;"><?php echo number_format($currentproduct['salePrice']); ?>đ</span>
						<span class="text-dark d-inline-block text-truncate" style="font-size: 110%; margin-left:5%;">    <?php echo number_format($currentproduct['Price']); ?>đ</span>
					<?php }
					else {?>
							<span class="text-dark d-inline-block text-truncate" style="font-size: 110%; margin-left:5%;">    <?php echo number_format($currentproduct['Price']); ?>đ</span>
					<?php }?>
					<br>
                    <a class="btn btn-primary" href="<?php echo BASE_URL?>'cart/add/'<?php echo $currentproduct['productId']?>/<?php echo $currentproduct['productName']?>/<?php if($currentproduct['salePrice']<>0)echo $currentproduct['salePrice']; else echo $currentproduct['Price'];?>">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col alert alert-danger text-center">
            CÁC SẢN PHẨM TƯƠNG TỰ
    </div>
</div>

<div class="row">

	<?php foreach($sameproducts as $sameproduct){?>
			<div class="col-md-3 col-sm-6 text-center card">
				<div><img src="<?php echo BASE_URL; ?>public/upload/<?php echo $sameproduct['Image']?>" class="card-img-top" alt="hinhsp"></div>
				<div class="card-body alert alert-success">

				<p><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                </p>

					<a href="<?php echo BASE_URL.'product/productdetail/'.$sameproduct['Alias']?>" class="text-decoration-none text-dark"><?php echo $sameproduct['productName']; ?></a></p>
					<!--h5 class="card-title"><//?php echo $product['productName']; ?></h5-->
					
					<?php if($sameproduct['salePrice']!='') {?>
						<span class="text-decoration-line-through text-secondary d-inline-block text-truncate" style="font-size: 110%;"><?php echo number_format($sameproduct['salePrice']); ?>đ</span>
						<span class="text-dark d-inline-block text-truncate" style="font-size: 110%; margin-left:5%;">    <?php echo number_format($sameproduct['Price']); ?>đ</span>
					<?php }
					else {?>
							<span class="text-dark d-inline-block text-truncate" style="font-size: 110%; margin-left:5%;">    <?php echo number_format($sameproduct['Price']); ?>đ</span>
					<?php }?>

					<button type="button" class="btn btn-primary btn-lg">Add to Cart</button>
				</div>
			</div>
		<?php } ?>
</div>
</div>

