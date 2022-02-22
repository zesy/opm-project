<?php 
include_once('../model/apresentacao.php');
include_once('apresentacao_dao.php');
$apresdao = new ApresentacaoDAO();

$apres = new Apresentacao();

$apres->setCidade($_POST["cidade"]);
$apres->setEstado($_POST["estado"]);
$apres->setEndereco($_POST["end"]);
$apres->setNumero($_POST["num"]);
$apres->setLocal($_POST["local"]);
$apres->setIdVerTente($_POST["idvert"]);

$data = $_POST["data"];
$hora = $_POST["hora"];

$datahora = new DateTime($data.' '.$hora);
$d = $datahora->format('Y-m-d H:i:s');
//echo $datahora;
$apres->setDatahora($d);

echo $apresdao->insertApresentacao($apres);

 ?>