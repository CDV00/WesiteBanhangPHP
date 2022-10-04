<?php
$brandmodel = new BrandModel;
$brands = $brandmodel->getAll(['trash' => 0, 'status' => 1]);
$catmodel = new CategoryModel;
$cats = $catmodel->getAll(['trash' => 0, 'status' => 1]);
$linkmodel = new LinkModel();
$links = $linkmodel->getAll(['trash' => 0, 'status' => 1, 'position' => 'globalnav']);
$imagemodel = new ImageModel;
$images = $imagemodel->getAll(['trash' => 0, 'status' => 1, 'position' => 1]);
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- sử dụng bootstrap css online-->
	<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"-->
	<!--chèn file css-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/style.css">
	<!--chèn file bootstrap css đã dowload-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css">
	<!--chèn file font awesome đã dowload-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/font/css/all.min.css">
	<!--chèn file bootstrap js đã dowload-->
	<script type="text/javascript" src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js"></script>
</head>

<body>
	<!-- sử dụng bootstrap js online-->
	<!--script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
	 integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" 
	 crossorigin="anonymous"></script-->
	<header class="container">
		<div class="row">
			<div class="col-md-4"><img src="<?php echo BASE_URL . 'public/img/' . $images[0]['image']; ?>" alt="brand"></div>
			<div class="col-md-5">

				<form class="d-flex" method=post action="<?php echo BASE_URL . 'product/productSearch/' . LIMIT . '/0/' ?>">
					<input name='searchKey' class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
				</form>
			</div>

			<div class="col-md-1">
				<span data-bs-toggle="modal" data-bs-target="#exampleModal">
					<i class="fas cart fa-shopping-cart fs-3" id="cartIcon"></i>
					<?php
					$cart = new Cart;
					if ($cart->getCount() != 0)
						echo '<span class="bg-danger rounded-circle px-2 align-baseline">' . $cart->getCount() . '</span>';
					?>
				</span>

			</div>
			<div class="col-md-2">
				<a class="btn btn-primary dn" href="<?php echo BASE_URL ?>auth/adminlogin">Đăng Nhập</a>
			</div>


			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-light bg-light">
					<div class="container-fluid">
						<a class="navbar-brand" href="<?php echo BASE_URL ?>">V STORE</a>
						<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link active" aria-current="page" href="<?php echo BASE_URL ?>">Home</a>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Brand
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
										<?php foreach ($brands as $brand) { ?>
											<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>product/productByBrand/<?php echo $brand['alias'] . '/' . LIMIT . '/0'; ?>"><?php echo $brand['brandName']; ?></a></li>
											<!--  Thanh gạch ngang   li><hr class="dropdown-divider"></li-->
											<!--li><a class="dropdown-item" href="#">OTHER...</a></li-->
										<?php } ?>
									</ul>
								</li>
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Category
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
										<?php foreach ($cats as $cat) { ?>
											<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>product/productByCat/<?php echo $cat['alias'] . '/' . LIMIT . '/0'; ?>"> <?php echo $cat['catName']; ?></a></li>
											<!--  Thanh gạch ngang   li><hr class="dropdown-divider"></li-->
											<!--li><a class="dropdown-item" href="#">OTHER...</a></li-->
										<?php } ?>
									</ul>
								</li>

								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
										Posts
									</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
										<li><a class="dropdown-item" href="<?php echo BASE_URL . 'page/showall/' . LIMIT ?>/0"> Xem Tất Cả</a></li>
										<li><a class="dropdown-item" href="<?php echo BASE_URL . 'page/showbytopic/tin-cong-nghe/' . LIMIT ?>/0"> Tin công nghệ</a></li>
										<li><a class="dropdown-item" href="<?php echo BASE_URL . 'page/showbytopic/thong-tin-shop/' . LIMIT ?>/0">Thông tin shop</a></li>
										<!--  Thanh gạch ngang   li><hr class="dropdown-divider"></li-->
										<!--li><a class="dropdown-item" href="#">OTHER...</a></li-->
									</ul>
								</li>

								<?php foreach ($links as $link) { ?>
									<li class="nav-item">
										<a class="nav-link active" aria-current="page" href="<?php echo BASE_URL . $link['link']; ?>"><?php echo $link['title']; ?></a>
									</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</nav>
			</div>

		</div>
	</header>