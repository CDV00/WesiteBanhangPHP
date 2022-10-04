<?php
require_once PATH_TO_MODUL . 'header.php';
?>

<?php
require_once PATH_TO_MODUL . 'slide.php';
?>


<div class="container">
	<div class="row">
		<div class="col-md-3">

			<?php
			require_once PATH_TO_MODUL . 'leftcategorymenu.php';
			?>


			<?php
			require_once PATH_TO_MODUL . 'leftbrandmenu.php';
			?>
		</div>

		<div class="col-md-9">

			<?php
			require PATH_TO_VIEW . $viewName . '.php';
			?>


		</div>
	</div>

	<!--footer-->
	<footer class="container-fluid bg-dark">
		<div class="row">
			<!--bottommenu1-->
			<?php
			require_once PATH_TO_MODUL . 'bottommenu1.php';
			?>

			<!--bottommenu2-->
			<?php
			require_once PATH_TO_MODUL . 'bottommenu2.php';
			?>
			<?php
			require_once PATH_TO_MODUL . 'bottommenu3.php';
			?>
			
			<?php
			require_once PATH_TO_MODUL . 'map.php';
			?>

		</div>
		<div class="row justify-content-center text-light">Design By C.D.V</div>
	</footer>

	<?php require_once PATH_TO_MODUL . 'cart.php'; ?>


	</body>

	</html>