<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/cargo.php');
include_once('cargo_dao.php');
$cargdao = new CargoDAO();

$cargo = new Cargo();

$cargo->setNome($_POST['ncargo']);

echo $cargdao->insertCargo($cargo);

?>