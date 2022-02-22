<?php
include_once(DIR_RAIZ."/mvc/controller/membro_dao.php");
include_once(DIR_RAIZ."/mvc/view/funcs/doCards.php");
$membrodao = new MembroDAO();
$bativo = isset($_POST['atv']) ? $_POST['atv'] : null;
$bfreela = isset($_POST['freela'])? $_POST['freela'] : null;
$bnafi = isset($_POST['nafi']) ? $_POST['nafi'] : null;
?>

<!-- MODAL SUBMIT -->
<div class="modal fade" id="buscamembro-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">

	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<!-- TÍTULO -->
			<div class="modal-header" align="center">
				<h4>Busca Membro</h4>
				<button id="butclosemodal" style="color: black;" type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			</div>

			<div class="modal-body"><!-- AO SUBMETER - LOADDING -->
				<form id="formfiltro" class="col-md-12" method="post">
					<div class="form-group">
						<label for="atv"><i class="fas fa-user-check"></i> Situação</label>
						<select style="height: 30px;" id="atv" name="atv" name="atv" class="form-control greenShadow bordersquared smalltxtsize margin5pxrl">
							<option selected value="2">Todos</option>
							<option value="1">Ativo</option>
							<option value="0">Inativo</option>
						</select>
					</div>
					<div class="form-group">
						<label for="freela"><i class="fas fa-handshake"></i> Freelancer</label>
						<select style="height: 30px;" id="freela" name="freela" class="form-control greenShadow bordersquared smalltxtsize margin5pxrl">
							<option selected value="2">Todos</option>
							<option value="1">S</option>
							<option value="0">N</option>
						</select>
					</div>

					<?php 
					if($_SESSION['user_access'] > MIN_ADMIN_BAR_ACCESS){
						?>
						<div class="form-group">
							<label for="nafi"><i class="fas fa-star"></i> Nível Afinidade</label>
							<select style="height: 30px;" id="nafi" name="nafi" class="form-control greenShadow bordersquared smalltxtsize margin5pxrl afinidadeselec">
								<option value="0">Todos</option>
								<option value="1">&#xf005;</option>
								<option value="2">&#xf005;&#xf005;</option>
								<option value="3">&#xf005;&#xf005;&#xf005;</option>
								<option value="4">&#xf005;&#xf005;&#xf005;&#xf005;</option>
								<option value="5">&#xf005;&#xf005;&#xf005;&#xf005;&#xf005;</option>
							</select>
						</div>
					<?php } ?>
					<hr>
					<button id="butonfiltramembro" class="btn btn-success bordersquared greenShadow wid100"><i class="fas fa-search"></i></button>
				</form>
				<!-- FIM CASOS ESPECIAIS - NÃO DELETAR -->
			</div>

		</div>
	</div>

</div>
<!-- End Modal -->




<div style="width: 100%;" class="form-row">
	<div class="col-md-12 nomagin form-row">
		<h3><i class="far fa-address-card"></i><i class="fas fa-search"></i> Buscar Membro</h3>
		<hr>
		<div class="col-sm-8">
			<input type="text" id="buscaListaMembro" style="font-family: 'Font Awesome 5 Free', 'Calibri'; font-weight: 501;" class="form-control greenShadow bordersquared" id="searchnome" placeholder="&#xf002; Buscar na lista - Digite o nome do membro ou instrumento" required="false">
		</div>
		<div class="col-sm-4 form-row">
			<div class="col-sm-5"></div>
			<div class="col-sm-7">
				<button class="btn bg-btn-green btn-block bordersquared" data-toggle="modal" data-target="#buscamembro-modal"><i class="fas fa-search"></i> Filtrar</button></div>
			</div>
		</div>

		<hr class="colorgraph" />

		<style type="text/css">
		.thnome{
			width: 65%;
		}
		.thinstru{
			width: 35%;
			text-align: center;
		}
		.thico{
			width: 35px;
		}
	</style>
	<table class="table table-hover">
		<thead>
			<tr>
				<th class="thnome">Nome</th>
				<th class="thinstru">Instrumentos</th>
				<th class="thico"></th>
			</tr>
		</thead>
		<tbody id="mTable" class="tableList">
			<?php
			$where = '';
			$condition = '';
			if($bativo!=null && $bnafi!=null && $bfreela!=null){
				$control=0;

				if($bativo!=null){
					if($bativo!=2){
						$where=' where ';
						($control==1)? $and=' and' : $and='';
						$condition.=$and." ativo=".$bativo;
						$control=1;
					}
				}

				if($bnafi!=null){
					if($bnafi!=0){
						$where=' where ';
						($control==1)? $and=' and' : $and='';
						$condition.= $and." nivelAfinidade=".$bnafi;
						$control=1;
					}
				}

				if($bfreela!=null){
					if($bfreela!=2){
						$where=' where ';
						($control==1)? $and=' and' : $and='';
						$condition.= $and." freelancer=".$bfreela;
						$control=1;
					}
				}

			}

			$par = $where.$condition;
			$row = $membrodao->selectAllMembro($par);
			if($row!=false)
				foreach ($row as $mem) {
					doCards::doMemberRow($mem['idMembro'], $mem['nome'], $mem['sobrenome'], $mem['idInstrumento'], $mem['ativo'], $mem['visivel']);
				}//fecha forech
			?>
			</tbody>
		</table>
		<tr>
		</tr>
	</div>