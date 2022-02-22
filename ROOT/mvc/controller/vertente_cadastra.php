<?php 
include_once('vertente_dao.php');
include_once('../model/vertente.php');
$vertdao = new VertenteDAO();
$vert = new Vertente();

$vert->setNome($_POST['vertnome']);
$vert->setPreco($_POST['vertvalor']);
$vert->setDescPqn($_POST['vertdescpqn']);
$vert->setDescricao($_POST['vertdesc']);
$vert->setFoto('OPM-250px.png');
$vert->setAtivo(0);

echo $vertdao->insertVertente($vert);

 ?>