<?php 

include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/instrumento.php');
include_once('instrumento_dao.php');
$instrudao = new InstrumentoDAO();

$instru = new Instrumento();

$atv = (isset($_POST['checkatv'])) ? 1 : 0;
$instru->setAtivo($atv);
$instru->setNome($_POST['instrunome']);
$instru->setNaipe($_POST['naipe']);
$instru->setNomeExibicao($_POST['nomeexib']);
$instru->setIcone($_POST['sicon']);

echo $instrudao->insertInstrumento($instru);
 ?>