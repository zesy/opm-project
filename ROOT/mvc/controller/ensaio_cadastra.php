<?php 
include_once('../model/ensaio.php');
include_once('ensaio_dao.php');
$ensdao = new EnsaioDAO();

$ensaio = new Ensaio();

$ensaio->setCidade($_POST["cidade"]);
$ensaio->setLocal($_POST["local"]);
$ensaio->setIdVerTente($_POST["idvert"]);

$data = $_POST["data"];
$hora = $_POST["hora"];

$datahora = new DateTime($data.' '.$hora);
$d = $datahora->format('Y-m-d H:i:s');
//echo $datahora;
$ensaio->setDatahora($d);

echo $ensdao->insertEnsaio($ensaio);

 ?>