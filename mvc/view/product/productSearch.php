
<?php
$products=$data['products'];
$paging=$data['paging'];
$totalRecords=$data['totalRecords'];
?>
<div class="container">
<div class='ml-3 text-danger '>
<?php
		if ($totalRecords==0)
				echo"không tìm thấy sản phẩm";
		else
			echo"Tổng tìm thấy ".$totalRecords." sản phẩm";

	?>
</div>
	


	<div class="row">
		
	



	<!--sản phẩm -->
	
		<?php foreach($products as $product){?>
		<div class="col-md-3 col-sm-6 text-center card">
			<div><img src="<?php echo BASE_URL; ?>public/upload/<?php echo $product['Image']?>" class="card-img-top" alt="hinhsp"></div>
				<div class="card-body alert alert-success">

				<p><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i>
                </p>

					<a href="<?php echo BASE_URL.'product/productdetail/'.$product['Alias']?>" class="text-decoration-none text-dark"><?php echo $product['productName']; ?></a></p>
					<!--h5 class="card-title"><//?php echo $product['productName']; ?></h5-->
					
					<?php if($product['salePrice']!='') {?>
						<span class="text-decoration-line-through text-secondary d-inline-block text-truncate" style="font-size: 110%;"><?php echo number_format($product['salePrice']); ?>đ</span>
						<span class="text-dark d-inline-block text-truncate" style="font-size: 110%; margin-left:5%;">    <?php echo number_format($product['Price']); ?>đ</span>
					<?php }
					else {?>
							<span class="text-dark d-inline-block text-truncate" style="font-size: 110%; margin-left:5%;">    <?php echo number_format($product['Price']); ?>đ</span>
					<?php }?>
					
					<a class="btn btn-primary" href="<?php echo BASE_URL?>'cart/add/'<?php echo $product['productId']?>/<?php echo $product['productName']?>/<?php if($product['salePrice']<>0)echo $product['salePrice']; else echo $product['Price'];?>">Add to Cart</a>
				</div>
			
		</div>
		<?php } ?>
	</div>
			<div class="row ">
					<?php $paging->createLinks();?>
			</div>
	</div>
</div>