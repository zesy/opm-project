<div class="col-md-12">
    <h3><i class="far fa-calendar-check""></i> Apresentações</h3>
    <hr>
</div>
<div class="col-md-12">
	<?php 
		include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/apresentacao_dao.php');
		include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/view/funcs/doCards.php');
		$apresdao = new ApresentacaoDAO();
		$apres = $apresdao->selectAllApresentacao();
		if(is_null($apres) || $apres == false)
		  echo "<h1>Ainda não temos agenda...</h1>";
		else{
			foreach ($apres as $ap) {
				doCards::doAnyApres($ap);
			}
		}
	 ?>
</div>