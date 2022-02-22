<?php 
include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');
include_once(DIR_RAIZ.'/mvc/controller/vertente_dao.php');
$vertdao = new VertenteDAO();
$vert = $vertdao->selectAllAtvVertente();

?>
<!-- MODAL ADD -->
<div class="modal fade" id="modalAddEnsaio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Cadastro de Ensaio</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php 
				if($vert == false)
					echo '<div class="modal-body">
					<h3 class="text-danger">Atenção!</h3>
					<h5>Não existem vertentes ativas para marcar uma ensaio!<h5>
					<h6>Vá para Cadastros -> Vertentes para cadastrar uma nova vertente.</h6>
					</div>';
				else
				{

			 ?>
			<form id="formok" style="width: 100%" method="post" role="form" post="../mvc/controller/ensaio_cadastra.php" spec="false">
				<div class="modal-body">
					<div class="form-group">
						<div class="form-group">
								<label for="cidade">Cidade</label>
								<input class="form-control bordersquared" type="text" name="cidade" id="cidade" placeholder="Cruzeiro" required="true">
						</div>
						<div class="form-group">
							<label for="local">Local</label>
							<input class="form-control bordersquared" type="text" name="local" id="local" maxlength="50" placeholder="Museu de Artes" required="true">
						</div>

						<div class="form-group">
							<div class="float-left" style="width: 69%">
								<label for="data">Data</label>
								<input class="form-control bordersquared" type="date" name="data" id="data" required="true" min="2019-01-01" max="2038-01-19">
							</div>
							<div class="float-right" style="width: 29%">
								<label for="hora">Horário</label>
								<input class="form-control bordersquared" type="time" name="hora" id="hora" required="true">
							</div>
						</div>
						<div class="form-group">
							<label for="vert">Vertente</label>
							<select class="form-control bordersquared" name="idvert" id="idvert">
								<?php 
								foreach ($vert as $v) {
									echo '<option value="'.$v["idVertente"].'">'.$v["nome"].'</option>';
								}

								?>
							</select>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success bordersquared greenshadow col-5"><i class="fas fa-save"></i> Gravar</button>
				</div>
			</form>
		<?php } ?>
		</div>
	</div>
</div>
<!-- FIM MODAL -->
<?php 
ModalSubmit::doModal('ensaio', 'Ensaio Atualizado!', 'Erro ao Atualizar Ensaio!');
ModalSubmit::doModalDel('ensaio');
ModalSubmit::doModalUpdate('Ensaio');


 ?>
<div style="width: 100%; padding-right: 10px;">
	<div class="form-row">
		<div class="col-md-12">
			<h3 class="float-left"><i class="fas fa-user-tie"></i> Ensaios</h3>
			<button class="btn btn-success bordersquared float-right" data-toggle="modal" data-target="#modalAddEnsaio"><i class="fas fa-plus"></i> Novo Ensaio</button>
		</div>
	</div>
	<hr>
	<div class="col-12">
		<table class="table table-hover tb-txt-center">
			<thead>
				<tr>
					<th style="width: 110px;">Data</th>
					<th style="width: 50px;">Horário</th>
					<th>Local</th>
					<th class="tb-th"></th>
				</tr>
			</thead>
			<tbody class="table-sm tb-td">
				<?php 
				doCards::doEnsaioRow();

				 ?>

			</tbody>
		</table>		
	</div>
	
</div>
