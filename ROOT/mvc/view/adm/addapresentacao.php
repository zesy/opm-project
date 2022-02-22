<?php 
include_once(DIR_RAIZ.'/mvc/view/funcs/doCards.php');
include_once(DIR_RAIZ.'/mvc/view/funcs/modal_submit.php');
include_once(DIR_RAIZ.'/mvc/controller/vertente_dao.php');

$vertdao = new VertenteDAO();
$vert = $vertdao->selectAllAtvVertente();
?>
<!-- MODAL ADD -->
<div class="modal fade" id="modalAddApres" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4>Cadastro de Apresentação</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<?php 
				if($vert == false)
					echo '<div class="modal-body">
					<h3 class="text-danger">Atenção!</h3>
					<h5>Não existem vertentes ativas para marcar uma apresentação!<h5>
					<h6>Vá para Cadastros -> Vertentes para cadastrar uma nova vertente.</h6>
					</div>';
				else
				{

			 ?>
			<form id="formok" style="width: 100%" method="post" role="form" post="../mvc/controller/apresentacao_cadastra.php" spec="false">
				<div class="modal-body">
					<div class="form-group">
						<div class="form-group">
							<div class="float-left" style="width: 79%;">
								<label for="cidade">Cidade</label>
								<input class="form-control bordersquared" type="text" name="cidade" id="cidade" placeholder="Cruzeiro" required="true">
							</div>

							<div class="float-right" style="width: 20%;">
								<label for="estado">UF</label>
								<select class="form-control bordersquared" name="estado" id="estado">
									<?php
									$estado = array("AC", "AL", "AM", "AP", "BA", "CE", "DF", "ES", "GO", "MA", "MG", "MS", "MT", "PA", "PB", "PE", "PI", "PR", "RJ", "RN", "RO", "RR", "RS", "SC", "SE", "SP", "TO");
									foreach ($estado as $uf) {
										echo '<option value="'.$uf.'">'.$uf.'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label for="local">Local</label>
							<input class="form-control bordersquared" type="text" name="local" id="local" maxlength="50" placeholder="Museu de Artes" required="true">
						</div>

						<div class="form-group">
							<div class="float-left" style="width: 79%;">
								<label for="end">Endereço</label>
								<input class="form-control bordersquared" type="text" name="end" id="end" maxlength="50" placeholder="R. N. Sra. Aparecida" required="true">
							</div>
							<div class="float-right" style="width: 20%">
								<label for="num">Número</label>
								<input class="form-control bordersquared" type="text" name="num" id="num" maxlength="7" required="true">
							</div>
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
ModalSubmit::doModal('apresentação', 'Apresentação Atualizado!', 'Erro ao Atualizar Apresentação!');
ModalSubmit::doModalDel('apresentação');
ModalSubmit::doModalUpdate('apresentação');


 ?>
<div style="width: 100%; padding-right: 10px;">
	<div class="form-row">
		<div class="col-md-12">
			<h3 class="float-left"><i class="fas fa-user-tie"></i> Apresentações</h3>
			<button class="btn btn-success bordersquared float-right" data-toggle="modal" data-target="#modalAddApres"><i class="fas fa-plus"></i> Nova Apresentação</button>
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
				doCards::doApresentacaoRow();

				 ?>

			</tbody>
		</table>		
	</div>
	
</div>
