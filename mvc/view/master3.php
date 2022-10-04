<!DOCTYPE html>
<html lang = "en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scle=1.0">
	<!-- sử dụng bootstrap css online-->
	<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" 
	integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"-->
	<!--chèn file css-->
	<link rel="stylesheet" type="text/css" href="../../public/css/style.css">
	<!--chèn file bootstrap css đã dowload-->
	<link rel="stylesheet" type="text/css" href="../../public/css/bootstrap.min.css">
	<!--chèn file font awesome đã dowload-->
	<link rel="stylesheet" type="text/css" href="../../public/font/css/all.min.css">
	<!--chèn file bootstrap js đã dowload-->
	<script type="text/javascript"src="../../public/js/bootstrap.min.js"></script>
</head>
	<body>
		<header class="container">
			<!-- <div class="row">
				<div class="col-md-4"><img src="<?php //echo BASE_URL.'public/img/vu_logo.png'; ?>" alt="brand"></div>
			</div> -->
		</header>

        <div class="container">
			

		

			<?php
				require_once PATH_TO_VIEW.$viewName.'.php';
			?>
        </div>


		<footer class="container-fluid bg-dark fixed-bottom"><div class="row justify-content-center text-light">Design By C.D.V</div></footer>
		
	</body>
</html>

