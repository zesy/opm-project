<div class="col-md-12">
    <h3><i class="faIcon far fa-calendar-minus"></i> Ensaios</h3>
    <hr>
</div>
<div class="col-md-12">
	<?php 
		include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/controller/ensaio_dao.php');
		include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/view/funcs/doCards.php');
		$endao = new EnsaioDAO();
		$ensaio = $endao->selectAllEnsaio();
		if(is_null($ensaio) || $ensaio == false)
		  echo "<h1>Ainda não temos ensaios agendados...</h1>";
		else{
			foreach ($ensaio as $ens) {
				doCards::doAnyEnsaio($ens);
			}
		}
	 ?>
</div>