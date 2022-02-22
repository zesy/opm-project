<?php 
session_start();
require 'check.php';
include 'init.php';
include_once(DIR_RAIZ."/mvc/view/funcs/doCards.php");
include_once(DIR_RAIZ."/mvc/controller/orquestra_dao.php");
include_once(DIR_RAIZ."/mvc/controller/membro_dao.php");
$membrodao = new MembroDAO();
$orqdao = new OrquestraDAO();
$orq = $orqdao->selectOrquestra();
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

	<script src="bootstrap/js/jquery-3.3.1.min.js"></script>
	<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

	<script src="js/myjs.js"></script>
	<script src="js/funcs.js"></script>

	<title><?php echo $orq["nome"]; ?></title>
</head>
<body>
	<?php

	$filesdesk = glob("img/bg-desk/{*.jpg,*.jpeg,*.JPG,*.JPEG,*.png,*.gif}", GLOB_BRACE);
	$filestablet = glob("img/bg-tablet/{*.jpg,*.jpeg,*.JPG,*.JPEG,*.png,*.gif}", GLOB_BRACE);
	$filessmart = glob("img/bg-smart/{*.jpg,*.jpeg,*.JPG,*.JPEG,*.png,*.gif}", GLOB_BRACE);

	$bgDesk = array();
	$bgTablet = array();
	$bgSmart = array();

	foreach($filesdesk as $idd => $imgd) $bgDesk[$idd] = $imgd;
	foreach($filestablet as $idt => $imgt) $bgTablet[$idt] = $imgt;
	foreach($filessmart as $ids => $imgs) $bgSmart[$ids] = $imgs;

		$di = rand(0, count($bgDesk)-1); // generate random number size of the array
		$selectedBgDesk = $bgDesk[$di]; // set variable equal to which random filename was chosen

		$ti = rand(0, count($bgTablet)-1); // generate random number size of the array
		$selectedBgTablet = $bgTablet[$ti]; // set variable equal to which random filename was chosen

		$si = rand(0, count($bgSmart)-1); // generate random number size of the array
		$selectedBgSmart = $bgSmart[$si]; // set variable equal to which random filename was chosen
		?>
		<style type="text/css">
		body{
			/*background-image: url(../img/OPM-250px-b.png);*/
			/*background-attachment: fixed;*/
		}
		/*-- bg smartphones --*/
		@media only screen 
		and (max-width : 480px) {
			.bg-img{
				background-image: url(<?php echo $selectedBgSmart; ?>);
			}
		}
		/*-- bg tablets --*/
		@media only screen 
		and (min-width : 481px) 
		and (max-width : 768px) {
			.bg-img{
				background-image: url(<?php echo $selectedBgTablet; ?>);
			}
		}
		/*-- bg desktops --*/
		@media only screen 
		and (min-width: 769px) 
		and (-webkit-min-device-pixel-ratio: 1) { 
			.bg-img{
				background-image: url(<?php echo $selectedBgDesk; ?>);

			}
		}
	</style>
	<!-- FIM SELECIONAR BG DO DISPOSITIVO -->
	<!-- NAVBAR DESKTOP -->
	<nav class="navbar bg-green navbar-fixed-top setOpacity" id="nav-fixed-desk">

		<span><img class="logoimg" src="img/logo/logo.jpg?v=<?php echo filemtime('img/logo/logo.jpg'); ?>" /></span>
		<ul>
			<li class="navbar-brand">
				<button class="btn bg-btn-green-menu bordersquared border0px scrollTo" href="#top"><i class="fa fa-home"></i> Home</button>
			</li>
			<li class="navbar-brand">
				<button class="btn bg-btn-green-menu bordersquared border0px scrollTo" href="#agenda"><i class="fa fa-book"></i> Agenda</button>
				<li class="navbar-brand ">
					<button class="btn bg-btn-green-menu bordersquared border0px scrollTo" href="#contrate"><i class="fas fa-file-signature"></i> Contrate-nos</button>
				</li>
				<!-- <li class="navbar-brand">
					<button class="btn bg-btn-green-menu bordersquared border0px scrollTo" href="#galeria"><i class="fa fa-images"></i> Galeria</button>
				</li> -->
				<li class="navbar-brand">
					<button class="btn bg-btn-green-menu bordersquared border0px scrollTo" href="#membros"><i class="fas fa-users"></i> Membros</button>
				</li>
				<li class="navbar-brand ">
					<button class="btn bg-btn-green-menu bordersquared border0px scrollTo" href="#historia"><i class="fa fa-history"></i> História</button>
				</li>
			</ul>
			<?php
			if (isLoggedIn()){
				echo '<button class="btn bg-btn-green bordersquared notopbottomborder" style="line-height: 1em;" onClick="redirectLogin()"><i class="fa fa-headphones"></i> Área de<br>Membros</button>';
			}
			else{
				echo '<button class="btn bg-btn-green bordersquared notopbottomborder" data-toggle="modal" data-target="#loginModal" style="line-height: 1em;"><i class="fa fa-headphones"></i> Área de<br>Membros</button>';
			}
			?>
			<script type="text/javascript">
				function redirectLogin(){
					location.href='perfil/index.php';
				}
			</script>
		</nav>
		<!-- FIM NAVBAR DESKTOP -->
		<!-- NAVBAR MOBILE -->
		<nav class="navbar navbar-dark bg-green navbar-fixed-top setOpacity" id="nav-fixed-mobile">
			<div class="dropdown bordersquared">

				<button class="btn bg-btn-green bordersquared border0px dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="navbar-toggler-icon"></span></button>

				<div class="bg-green dropdown-menu bordersquared padding0px" aria-labelledby="dropdownMenuButton">

					<button class="dropdown-item btn bg-btn-green bordersquared scrollTo notopbottomborder" href="#top"><i class="fa fa-home"></i> Home</button>

					<button class="dropdown-item btn bg-btn-green bordersquared scrollTo notopbottomborder" href="#agenda"><i class="fa fa-book"></i> Agenda</button>

					<button class="dropdown-item btn bg-btn-green bordersquared scrollTo notopbottomborder" href="#contrate"><i class="fas fa-file-signature"></i> Contrate-nos</button>

					<!-- <button class="dropdown-item btn bg-btn-green bordersquared scrollTo notopbottomborder" href="#galeria"><i class="fa fa-images"></i> Galeria</button> -->

					<button class="dropdown-item btn bg-btn-green bordersquared scrollTo notopbottomborder" href="#membros"><i class="fas fa-users"></i> Membros</button>

					<button class="dropdown-item btn bg-btn-green bordersquared scrollTo notopbottomborder" href="#historia"><i class="fa fa-history"></i> História</button>

				</div>
			</div>
			<span><img class="logoimg" src="img/logo/logo.jpg?v=<?php echo filemtime('img/logo/logo.jpg'); ?>" /></span>
			<button style="color: white; line-height: 1em;" class="btn bg-btn-green bordersquared notopbottomborder" data-toggle="modal" data-target="#loginModal"><i class="fa fa-headphones"></i></span> Área de<br>Membros</button>
		</nav>
		<!-- FIM NAVBAR MOBILE -->
		<!-- Modal Login -->
		<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-body" align="center">
						<img src="img/OPM-250px.png">
						<button style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					</div>
					<div class="modal-body">
						<hr class="colorgraph" />
						<h4 class="modal-title" style="width: 100%;" id="myModalLabel">Faça seu Login:</h4>
					</div>
					<form action="login.php" name="login" method="post" id="loginform" class="form-horizontal" role="form">

						<div class="modal-body">
							<div style="margin-bottom: 25px" class="input-group">
								<button class="btn btn-success bordersquared" disabled="true"><i class="fa fa-user"></i></button>
								<input id="login-username" type="text" class="form-control bordersquared greenShadow" name="username" value="" placeholder="Usuário" aria-label="Left Align" required="true">
							</div>
							<div style="margin-bottom: 5px" class="input-group">
								<button class="btn btn-success bordersquared" disabled="true"><i class="fa fa-key"></i></button>
								<input id="login-password" type="password" class="form-control bordersquared greenShadow" name="password" placeholder="Senha" required="true">
								
							</div>
							<div id="login-alert" class="alert alert-danger alert-dismissible fade show noradius">Usuário ou senha inválida!</div>
							<div id="login-inative" class="alert alert-danger alert-dismissible fade show noradius">Usuário inativo!</div>
						</div>
						<div class="modal-footer bordersquared">
							<button id="botaoentrar" class="btn btn-lg btn-success btn-block bordersquared"><i class="fas fa-sign-in-alt"></i> Entrar</button>
						</div>
						<script src="js/valida_login.js"></script>
					</form> 
				</div>
			</div>
		</div>
		<!-- End Modal -->
		<div id="top" class="pagediv">
			<div class="bg-img">
				
				
			</div>
		</div>

		<!-- DIV AGENDA -->
		
		<div class="pagediv">
			<div class="text-center divbox" id="agenda">
				<div><h1><br></h1></div>
				<h1>Agenda</h1><br/>
				<?php 
					include('mvc/view/apresentacao.php');
				?>
				<div style="padding-top: 35px;">
					<a href="agenda.php"><button class="btn btn-success bordersquared">Agenda Completa</button></a>
				</div>
			</div>
		</div>


		<!-- DIV CONTRATAR -->
		<div class="pagediv">
			<div class="text-center divbox" id="contrate">
				<div><h1><br></h1></div>
				<h1>Contrate-nos</h1><br/>
				<div class="row">

					<!-- A CARD -->
					<?php
					doCards::doVertCard();
					?>
					<!-- END CARD -->

				</div>
			</div>
		</div>

		<!-- DIV GALERIA -->
		<!-- <div class="pagediv">
			<div class="text-center divbox" id="galeria" >
				<div><h1><br></h1></div>
				<h1>Galeria</h1><br/>
			</div>
		</div> -->

		<!-- DIV MEMBROS -->
		<div class="pagediv">
			<div class="text-center divbox" id="membros">
				<div><h1><br></h1></div>
				<h1>Membros</h1><br/>
				<div class="row">
					<!-- A CARD -->
					<div id="divdiretores" class="row">
						<?php
						$row_membro = $membrodao->selectAllMembro(' where ativo = 1 and visivel = 1 and (idCargo = 1 or idCargo = 2)');
						if($row_membro != false && !is_null($row_membro)){
							foreach ($row_membro as $membro) {
								doCards::doMemberCard($membro);
							}
						}
						?>
					</div>
					<div id="divmembros" class="row">
						<?php
						$row_membro = $membrodao->selectAllMembro(' where ativo = 1 and visivel = 1 and (idCargo <> 1 and idCargo <> 2 or idCargo is null) order by rand() limit 10');
						if($row_membro != false && !is_null($row_membro)){
							foreach ($row_membro as $membro) {
								doCards::doMemberCard($membro);
							}
						}
						?>
					</div>
					<!-- END CARD -->

				</div>
				<div style="width: 100%; height: 40px; text-align: center;">
					<a href="membros.php">
						<button class="btn btn-success bordersquared btn-shadow"><i class="fa fa-arrow-right"></i> Mais Membros</button>
					</a>
				</div>
			</div>

		</div>
		<!-- DIV HISTORIA -->
		<div class="pagediv">
			<div class="text-center divbox" id="historia">
				<div><h1><br></h1></div>
				<h1>História</h1><br/>
				<?php 
				if($orq['historia'] == false || $orq['historia'] == null)
					echo 'nothing';
				else
					echo nl2br($orq['historia']);
				?>
			</div>
		</div>
		<div class="divfooter">
			<div>
				<a href="https://fb.me/MantiqueiraOrchestra" target="_blank"><button class="facebook2 btnFooterSocial"><i class="fab fa-facebook-f"></i> /MantiqueiraOrchestra</button></a>
				<a href="https://www.instagram.com/orquestraopm/" target="_blank"><button class="instagram2 btnFooterSocial"><i class="fab fa-instagram"></i> /OrquestraOPM</button></a>
			</div>
		</div>

	</body>
	</html>

