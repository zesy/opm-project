<nav class="navbar bg-green navbar-fixed-top setOpacity" id="nav-fixed-desk">
	<span><a href="../"><img class="logoimg" src="../img/logo/logo.jpg?v=<?php echo filemtime('../img/logo/logo.jpg'); ?>" /></a></span>
	<?php 
	if($_SESSION['user_access'] >= MIN_ADMIN_BAR_ACCESS){
		include '../mvc/view/perfil/perfil_menudesk.php';
	}
	?>
	<ul>
		<li class="navbar-brand">
			<a href="../perfil/"><button class="btn bg-btn-green-menu bordersquared border0px greenShadow"><i class="fa fa-home"></i> Home</button></a>
		</li>
	</ul>
</nav>