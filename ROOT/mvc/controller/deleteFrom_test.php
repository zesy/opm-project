<?php

$id = $_POST['id'];
$table = $_POST['table'];

if(strcmp($table, 'apresentacao') == 0){
	include_once('apresentacao_dao.php');
	echo ApresentacaoDAO::deleteApresentacao($id);
}
else if(strcmp($table, 'cargo') == 0){
	include_once('cargo_dao.php'); 
	echo CargoDAO::deleteCargo($id);
}

else if(strcmp($table, 'instrumento') == 0){
	include_once('instrumento_dao.php'); 
	echo InstrumentoDAO::deleteInstrumento($id);
}

else if(strcmp($table, 'vertente') == 0){
	include_once('vertente_dao.php'); 
	echo VertenteDAO::deleteVertente($id);
}

else if(strcmp($table, 'partitura') == 0){
	include_once('partitura_dao.php'); 
	echo PartituraDAO::deletePartitura($id);
}

else if(strcmp($table, 'apresentacao') == 0){
	include_once('apresentacao_dao.php'); 
	echo ApresentacaoDAO::deleteApresentacao($id);
}

else if(strcmp($table, 'ensaio') == 0){
	include_once('ensaio_dao.php'); 
	echo EnsaioDAO::deleteEnsaio($id);
}

else if(strcmp($table, 'membro') == 0){
	include_once('membro_dao.php'); 
	echo MembroDAO::deleteMembroById($id);
}


?>