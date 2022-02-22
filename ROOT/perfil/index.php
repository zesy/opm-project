<?php 
header('Content-type: text/html; charset=UTF-8');
 ?><!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
	include_once('header.php');
	session_start();

	require('../check.php');

	if (isLoggedIn() == false){
		header('Location: ../');
		exit();
	}
?>
</head>
<body>
	<!-- NAVBAR DESKTOP -->
	<?php
		include(DIR_RAIZ."/mvc/view/deskMenu.php");
	?>
	<!-- FIM NAVBAR DESKTOP -->
	<!-- NAVBAR MOBILE -->
	<?php
		include(DIR_RAIZ."/mvc/view/mobileMenu.php");
	?>
	<!-- FIM NAVBAR MOBILE -->

	<?php
		include(DIR_RAIZ."/mvc/view/leftMenu.php");
	?>

  <div id="main" class="main">
  	<div class="fix51margin"></div>

  	<div id="pagMain" class="row" style="margin: 0;">
  		<?php
  		include(DIR_RAIZ."/mvc/view/perfil/welcome.php");
  		?>
  	</div>

  </div>

	<?php
		include_once('body_scripts.php');
	?>
</body>
</html>

