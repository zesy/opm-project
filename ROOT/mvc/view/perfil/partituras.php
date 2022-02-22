<?php
$id = 1;  
$nome = "Nome";
$autor = "Autor";
$instru = "Nenhum";
$instruicon = "icons8-violino.png"; //Icone do instrumento

include_once(DIR_RAIZ.'/mvc/controller/musica_dao.php');
include_once(DIR_RAIZ.'/mvc/controller/instrumento_dao.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');
$musicdao = new MusicaDAO();
$instrudao = new InstrumentoDAO();

$musicas = $musicdao->selectAllMusica();
$instrumentos = $instrudao->selectAllInstrumentoAtv();

	?>
	<!-- Modal Nova Musica -->
	<div class="modal fade" id="novaMusicaModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="buscarMusicaModalLabel"><i class="fas fa-plus"></i> Cadastrar Música</h4>
					<button style="color: black;" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

				</div>
				<form id="formaddmusica" class="form_submit" style="width: 100%" method="post" role="form" post="../mvc/controller/musica_cadastra.php" spec="false">
					<div class="modal-body" align="center">
						
					<div style="margin-bottom: 5px" class="col-sm-12 my-1 input-group">
						<div style="width: 45px;" class="divbtn bg-green bordersquared socialText1em" disabled="true"><i class="fas fa-music"></i></div>
						<input id="addMusica" type="text" name="addMusica" placeholder="Música" class="form-control noradius greenShadow" required="true" />
					</div>

					<div style="margin-bottom: 5px" class="col-sm-12 my-1 input-group">
						<div style="width: 45px;" class="divbtn bg-green bordersquared socialText1em"><i class="fas fa-user-tie"></i></div>
						<input id="addAutor" type="text" name="addAutor" placeholder="Autor" class="form-control noradius greenShadow" required="true" />
					</div>

				</div>
				<div class="modal-footer">
					<div style="margin-bottom: 5px" class="col-sm-12 input-group">
						<button type="submit" class="btn btn-success noradius wid100"><i class="fas fa-upload"></i> Gravar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- End Modal -->
<!-- Modal Nova Partitura -->
<div class="modal fade" id="novaPartitura" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="buscarMusicaModalLabel"><i class="fas fa-plus-circle"></i> Cadastrar Partitura</h4>
				<button style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				
			</div>
			<form id="formaddpartitura" enctype="multipart/form-data" class="form_submit" style="width: 100%" method="post" role="form" post="../mvc/controller/partitura_cadastra.php" spec="false">
				<input type="hidden" name="idUser" value="<?php echo $_SESSION['user_id']; ?>">
			<div class="modal-body" align="center">
				<div style="margin-bottom: 5px" class="col-sm-12 my-1 input-group">
					<div style="width: 45px;" class="divbtn bg-green bordersquared socialText1em"><i class="fas fa-music"></i></div>
					<select id="pMusica" name="pMusica" placeholder="Musica" class="form-control noradius greenShadow" required="true" style="height: 43px;">
						<?php 
						foreach ($musicas as $music) {
						 	echo '<option value="'.$music["idMusica"].'" >'.$music["nome"].' - '.$music["autor"].'</option>';
						 } ?>
					</select>
				</div>

				<div style="margin-bottom: 5px" class="col-sm-12 my-1 input-group">
					<div style="width: 45px;" class="divbtn bg-green bordersquared socialText1em"><i class="fas fa-drum"></i></div>
					<select id="pInstru" name="pInstru" placeholder="Instrumento" class="form-control noradius greenShadow" required="true" style="height: 43px;">
						<?php 
						foreach ($instrumentos as $inst) {
						 	echo '<option value="'.$inst["idInstrumento"].'" >'.$inst["nome"].'</option>';
						 } ?>
					</select>
				</div>
				<div style="margin-bottom: 5px" class="col-sm-12 my-1 input-group">
					
					<input id="pPartitura" type="file" accept="application/pdf" name="pPartitura" class="fileUpload form-control noradius greenShadow" required="true" />
				</div>

			</div>
			<div class="modal-footer">
				<div style="margin-bottom: 5px" class="col-sm-12 input-group">
					<button class="btn btn-success noradius wid100"><i class="fas fa-upload"></i> Gravar</button>
				</div>
			</div>
		</form>
		</div>
	</div>
</div>
<!-- End Modal -->

<?php 

ModalSubmit::doModal('Música', 'Atualizado!', 'Erro ao Atualizar!');
ModalSubmit::doModalDel('Música');
 ?>

<div class="row" style="padding: 0; padding-right: 10px;">
	
	<div style="width: 45%; margin-right: 5%; float: left;">
		<div class="col-md-12" style="padding: 0;">
			<h4><i class="fas fa-music"></i> Partituras</h4>
		</div>
		<!-- <button id="btnBuscaPartituta" type="submit" class="btn btn-success btn-block bordersquared col-md-6" data-toggle="modal" data-target="#musicaModal"><i class="fas fa-search"></i> Buscar</button> -->

		<button id="btnAddPartitura" type="submit" class="btn btn-success btn-block bordersquared col-md-6" data-toggle="modal" data-target="#novaPartitura"><i class="fas fa-plus-circle"></i> Add Partitura</button>
	</div>
	<div style="width: 45%; margin-left: 5%; float: right;">
		<h4 align="right"><i class="fas fa-music"></i> Músicas</h4>
		<button id="btnBuscaPartituta" type="submit" style="float: right;" class="btn btn-success btn-block bordersquared col-md-6" data-toggle="modal" data-target="#novaMusicaModal"><i class="fas fa-plus"></i> Add Música</button>
	</div>
	
</div>
<hr>
<div class="col-md-12" style="padding: 5px; ">
		<input type="text" style="float: left; font-family: 'Font Awesome 5 Free', 'Calibri'; font-weight: 501;" class="form-control greenShadow bordersquared col-md-8" id="buscaLista" placeholder="&#xf002; Buscar - digite nome da música, autor ou instrumento" required="false">
</div>

	<hr class="colorgraph">



<div style="width: 100%;">
	<table class="table table-sm table-hover table-striped">
		<thead>
			<tr>
				<th>Música</th>
				<th>Autor</th>
				<th style="width: 35px;">Instru.</th>
				<th style="width: 30px;"></th>
				<th style="width: 30px;"></th>
			</tr>
		</thead>
		<tbody id="bTable" class="tableList">
			<?php 
				include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php'); 
				doCards::doPartituraRows();
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
		
	</script>