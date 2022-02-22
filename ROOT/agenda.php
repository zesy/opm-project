<?php
include_once('init.php');
include_once(DIR_RAIZ.'/mvc/controller/apresentacao_dao.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
include_once(DIR_RAIZ."/mvc/controller/orquestra_dao.php");
$apresdao = new ApresentacaoDAO();
$orqdao = new OrquestraDAO();
$orq = $orqdao->selectOrquestra();

setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />

	<link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
	<link href="css/style-home.css?v=<?php echo filemtime('css/style-home.css'); ?>" rel="stylesheet" type="text/css">

	<link href="css/all.min.css" rel="stylesheet">

	<title><?php echo $orq["nome"]; ?></title>
</head>
<body>
	<!-- NAVBAR DESKTOP -->
	<nav class="navbar bg-green navbar-fixed-top setOpacity" id="nav-fixed">

		<span><img class="logoimg" src="img/logo/logo.jpg" /></span>
		<ul>
			<li class="navbar-brand">
				<a href="index.php#membros"><button class="btn bg-btn-green-menu bordersquared border0px scrollTo greenShadow" ><i class="fa fa-home"></i> Home</button></a>
			</li>
		</ul>
		<button class="btn bg-btn-green-menu bordersquared notopbottomborder greenShadow" data-toggle="modal" data-target="#loginModal" style="line-height: 1em;"><i class="fa fa-headphones"></i> Área de<br>Membros</button>
	</nav>
	<!-- FIM NAVBAR DESKTOP -->
	<!-- Modal Login -->
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body" align="center">
					<img src="img/logo/logo.jpg">
					<button style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				</div>
				<div class="modal-body">
					<hr class="colorgraph" />
					<h4 class="modal-title" style="width: 100%;" id="myModalLabel">Faça seu Login:</h4>
				</div>
				<form method="post" id="loginform" class="form-horizontal" role="form">
					<div class="modal-body">
						<div style="margin-bottom: 25px" class="input-group">
							<button class="btn btn-success bordersquared" disabled="true"><i class="fa fa-user"></i></button>
							<input id="login-username" type="text" class="form-control bordersquared greenShadow" name="username" value="" placeholder="Usuário" aria-label="Left Align" required="true">
						</div>
						<div style="margin-bottom: 5px" class="input-group">
							<button class="btn btn-success bordersquared" disabled="true"><i class="fa fa-key"></i></button>
							<input id="login-password" type="password" class="form-control bordersquared greenShadow" name="password" placeholder="Senha" required="true">
						</div>
					</div>
					<div class="modal-footer bordersquared">
						<button type="submit" class="btn btn-lg btn-success btn-block bordersquared"><i class="fas fa-sign-in-alt"></i> Entrar</button>
					</div>
				</form> 
			</div>
		</div>
	</div>
	<!-- End Modal -->

	<!-- DIV AGENDA -->
	<div class="pagediv">
		<div class="text-center divbox" id="top">
			<div class="setOpacity6">
				<h1><br><br></h1>
				<h1 style="color: #28a745;">Agenda Completa <i class="fas fa-book"></i></h1>
				<img class="logoimg" src="img/logo/logo.jpg?v=<?php echo filemtime('img/logo/logo.jpg'); ?>" />
				<h1><br></h1>
			</div>
			<?php 	
				$pres = $apresdao->selectAllApresentacao();

				if(is_null($pres) || $pres == false)
		  			echo "<h1>Ainda não temos agenda...</h1>";
				else{
					foreach ($pres as $ap)
						doCards::doAnyApres($ap);
				}

			 ?>
		</div>
	</div>

	<div class="divfooter">
		<div>
			<a href="https://fb.me/MantiqueiraOrchestra" target="_blank"><button class="facebook2 btnFooterSocial"><i class="fab fa-facebook-f"></i> /MantiqueiraOrchestra</button></a>
			<a href="https://www.instagram.com/orquestraopm/" target="_blank"><button class="instagram2 btnFooterSocial"><i class="fab fa-instagram"></i> /OrquestraOPM</button></a>
		</div>
	</div>

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="js/myjs.js"></script>
	<script src="js/funcs.js"></script>
</body>
</html>

