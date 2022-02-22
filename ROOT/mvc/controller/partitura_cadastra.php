<?php 
// $url = $_SERVER["PHP_SELF"];
// if(preg_match("partitura_cadastra.php", "$url"))
// {
// 	header("Location: ../index.php");
// }
include_once("../model/partitura.php");
include_once("partitura_dao.php");
include_once("uploadArquivo.php");
$partdao = new PartituraDAO();

$raiz = $_SERVER['DOCUMENT_ROOT'];
$caminho = "/partituras/";
$upArqv = new UploadArquivo();
$nome = '';

$tipos = array('pdf', 'PDF');
if(isset($_FILES["pPartitura"])){
	$doUp = $upArqv->uploadArqv($_FILES["pPartitura"], $raiz.$caminho, $tipos);
	if($doUp == 1)
	{
		$nome = $upArqv->getNome();
		$exte = $upArqv->getTipo();
	//$tipo = $upArqv->getTipo();
	//$tamanho = $upArqv->getTam();
	}else if($doUp == 2){
		echo "Erro ao efetuar Upload!<br>Arquivo não copiado!";
		exit;
	}
	else{ //if($doUp == -1){
		echo "Extenção não permitida!";
	}
}
else{
	echo "Nenhum arquivo válido para upload!";
	exit;
}

$part = new Partitura();
$part->setIdMusica($_POST["pMusica"]);
$part->setIdInstrumento($_POST["pInstru"]);
$part->setCaminho($nome.'.'.$exte);
$part->setIdUser($_POST["idUser"]);

echo $partdao->insertPartitura($part);
?>