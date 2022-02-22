<?php 
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');
include_once(DIR_RAIZ.'/mvc/controller/membro_dao.php');
ModalSubmit::doModalAjaxUpdate();
$membrodao = new MembroDAO();
$bdm_foto = $membrodao->selectMembroFotoByUser($_SESSION['user_id']);
$dir_foto = '../img/perfil_users/'.$bdm_foto;
$scr_foto = $dir_foto.'?u='.filemtime($dir_foto);
 ?>
<div class="modal fade" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body" align="center" >
				<div id="upload-demo" class="center-block"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary bordersquared" data-dismiss="modal"><i class="fas fa-times"></i> Cancelar</button>
				<button type="button" id="cropImageBtn" class="btn btn-success bordersquared"><i class="fas fa-save"></i> Recortar & Salvar</button>
			</div>
		</div>
	</div>
</div>

<div id="leftSidenav" class="sidenav">
		<!-- <span href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</span> -->
		<div class="row avatarimgpdd">
			
			<div class="fileUpload bordersquared" style="width: 90%;">
				<label class="labelavatar">
					<div class="avatar">
						<img id="img_perfil" class="avatarimg" src="<?php echo $scr_foto; ?>" alt="Perfil" />
						<div id="avatarnamediv" class="avatarname"><?php echo $_SESSION['user_name']; ?></div>
						<div id="avataruploaddiv" class="avatarname"><i class="fas fa-upload"></i> Alterar Foto</div>
					</div>
					<input type="hidden" name="id_img" id="id_img" value="<?php echo $_SESSION['user_id']; ?>">
					<input id="botaoAlterarFoto" type="file" class="upload actionUpload uploadCroppieFoto" accept="image/png, image/jpeg" onclick="setCroppieViewPort(<?php echo $_SESSION['user_id'].', '.PERFIL_H.', '.PERFIL_W; ?>, 'img_perfil')"/>
				</label>
			</div>
			
      </div>
      <div class="perfilmenu" style="padding-left: 15px; font-size: .8em;">
      	<a href="index.php"><i class="far fa-calendar-alt"></i> Agenda</a>
      	<a href="meuperfil.php"><i class="fas fa-user-circle"></i> Perfil</a>
      	<a href="instrumentos.php"><i class="fas fa-drum"></i> Instrumentos</a>
      	<a href="partitura.php"><i class="fas fa-music"></i> Partituras</a>
      	<a href="configUser.php"><i class="fas fa-key"></i> Senha</a>
      	<a href="social.php"><i class="far fa-thumbs-up"></i> Social</a>
      	<br/> 
      	<a href="../logoff.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
      </div>

      <div class="fix51margin"></div>
  </div>