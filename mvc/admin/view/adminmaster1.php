<!DOCTYPE html>
<html lang = "en">
<head>
	<title>store</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scle=1.0">
	<!-- sử dụng bootstrap css online-->
	<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"-->
	<!--chèn file css-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/style.css">
	<!--chèn file bootstrap css đã dowload-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>public/css/bootstrap.min.css">
	<!--chèn file font awesome đã dowload-->
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL;?>public/font/css/all.min.css">
	<!--chèn file bootstrap js đã dowload-->
	<script type="text/javascript"src="<?php echo BASE_URL; ?>public/js/bootstrap.min.js"></script>
</head>
<body>
<header class="container bg-light">
    <div class="row">
        <div class="col-md-4"><img src="<?php echo BASE_URL; ?>public/img/vu_logo.png" alt="brand"></div>
        <div class="col-md-4"></div>
          <div class="col-md-4">
              <?php if(isset($_SESSION['username'])) echo 'Xin chào '.$_SESSION['username'].'&nbsp&nbsp&nbsp'?>
              <a  class="btn btn-primary"href="<?php echo BASE_URL?>auth/adminLogout">Đăng xuất</a>
          </div>
    </div>

</header>
<div class="container">
    <div class="row">
        <div class="col-md-3">
			    <div class="card">
              <a href="<?php echo BASE_URL?>dashboard/home" class='text-decoration-none text-dark'><h5 class="card-header">DASHBOARD</h5></a>
                
                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item">
                          <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                              Quản lý sản phẩm
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminproduct/Addproduct">Thêm sản phẩm</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminproduct/productlist"<?php echo LIMIT.'/0'?>>Xem danh sách sản phẩm</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminproduct/productlistInTrash"<?php echo LIMIT.'/0'?>>Xem thùng rác</a>
                            </div>
                          </div>
                       </div> 
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="false" aria-controls="collapseTwo">
                              Quản lý nhóm sản phẩm
                            </button>
                          </h2>
                          <div id="collapsetwo" class="accordion-collapse collapse " aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>admincategory/addcategory">Thêm nhóm sản phẩm</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>admincategory/categorylist"<?php echo LIMIT.'/0'?>>Xem danh sách nhóm sản phẩm</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>admincategory/categorylistInTrash"<?php echo LIMIT.'/0'?>>Xem thùng rác</a>
                            </div>
                          </div>
                       </div>
                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="false" aria-controls="collapseThree">
                              Quản lý thương hiệu sản phẩm
                            </button>
                          </h2>
                          <div id="collapsethree" class="accordion-collapse collapse " aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminbrand/addbrand">Thêm thương hiệu</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminbrand/brandlist"<?php echo LIMIT.'/0'?>>Xem danh sách thương hiệu</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminbrand/brandlistInTrash"<?php echo LIMIT.'/0'?>>Xem thùng rác</a>
                            </div>
                          </div>
                       </div>

                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingfour">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                              Quản lý liên kết
                            </button>
                          </h2>
                          <div id="collapsefour" class="accordion-collapse collapse " aria-labelledby="headingfour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminlink/addlink">Thêm liên kết</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminlink/linklist"<?php echo LIMIT.'/0'?>>Xem danh sách liên kết</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminlink/linklistInTrash"<?php echo LIMIT.'/0'?>>Xem thùng rác</a>
                            </div>
                          </div>
                       </div>

                       <div class="accordion-item">
                          <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapseFive">
                              Quản lý hình ảnh
                            </button>
                          </h2>
                          <div id="collapsefive" class="accordion-collapse collapse " aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminbrand/addbrand">Thêm hình ảnh</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminimage/imagelist"<?php echo LIMIT.'/0'?>>Xem danh sách hình ảnh</a>
                            <a class="nav-link btn btn-success" href="<?php echo BASE_URL?>adminbrand/brandlistInTrash"<?php echo LIMIT.'/0'?>>Xem thùng rác</a>
                            </div>
                          </div>
                       </div>                    
                  </div>

              </div>
           
       
        </div>
<div class='col-md-9'>
<?php require_once PATH_TO_ADMINVIEW.$viewName.".php" ?>

</div>
    </div>
</div>


   <footer  class="container-fluid bg-dark fixed-bottom"><div class="row justify-content-center text-light">Design By C.D.V</div></footer>



</body>
</html>