<nav class="navbar navbar-dark bg-green navbar-fixed-top setOpacity" id="nav-fixed-mobile">
	<ul style="float: left; height: 100%; padding-left: 0px;">
		<li class="navbar-brand">
			<button id="barsmenu" class="btn bg-btn-green-menu bordersquared border0px greenShadow" onclick="openNav()"><i class="fa fa-bars"></i></button>
		</li>
	</ul>
	<span><a href="../"><img class="logoimg" src="../img/logo/logo.jpg?v=<?php echo filemtime('../img/logo/logo.jpg'); ?>" /></a></span>
	<?php 
	if($_SESSION['user_access'] >= MIN_ADMIN_BAR_ACCESS){
		include '../mvc/view/perfil/perfil_menumobile.php';
	}
	else{
		echo '<div style="height: 100%;"></div>';
	}
	?>
	
</nav>