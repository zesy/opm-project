<?php 
setlocale(LC_TIME, 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

include_once('mvc/controller/apresentacao_dao.php');
include_once('mvc/view/funcs/doCards.php');

$apresdao = new ApresentacaoDAO();
$apres = $apresdao->selectAllApresentacao();

if(is_null($apres) || $apres == false)
  echo "<h1>Ainda não temos agenda...</h1><br><h2>Contrate-nos!</h2>";
else{
  echo '<div class="row col-md-12 h-75">';
  $cont = 0;
  foreach ($apres as $ap) {
    if ($cont == 0) {
      doCards::doFirstApres($ap);
      $cont++;
    }
    else if ($cont == 1) {
      echo '<div class="col-md-7">
      <div class="text-center">
      <h3>Outras Datas</h3>
      <br>
      </div>';
      doCards::doAnyApres($ap);
      $cont++;
    }
    else{
      doCards::doAnyApres($ap);
    }
  }
  echo '</div></div>';
}
?>