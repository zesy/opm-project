<?php 
include_once('vertente_dao.php');
include_once('../model/vertente.php');
$vertdao = new VertenteDAO();
$vert = new Vertente();

$vert->setIdVertente($_POST['id_vert']);
$vert->setNome($_POST['vertnome']);
$vert->setPreco($_POST['vertvalor']);
$vert->setDescPqn($_POST['vertdescpqn']);
$vert->setDescricao($_POST['vertdesc']);


echo $vertdao->updateVertente($vert);

 ?>