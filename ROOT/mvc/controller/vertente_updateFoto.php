<?php 
include_once('vertente_dao.php');
$vertdao = new VertenteDAO();
$imagem = $_POST['dado'];
$id_vert = $_POST['id'];

// EXEMPLOS
// Separando tipo dos dados da imagem
// $tipo: data:image/png
// $dados: base64,AAAFBfj42Pj4
list($tipo, $dados) = explode(';', $imagem);

// Isolando apenas o tipo da imagem
// $tipo: image/png
list(, $tipo) = explode(':', $tipo);

// Isolando apenas os dados da imagem
// $dados: AAAFBfj42Pj4
list(, $dados) = explode(',', $dados);

// Convertendo base64 para imagem
$dados = base64_decode($dados);

// Gerando nome aleatório para a imagem
//$nome = md5(uniqid(time()));
$nome = 'vert_id_'.$id_vert.'.jpg';

// Salvando imagem em disco
$send = file_put_contents($_SERVER['DOCUMENT_ROOT']."/img/vert_img/".$nome, $dados);
if($send != false)
    echo $vertdao->updateVertFoto($id_vert, $nome);
else
    echo 'Falha ao gravar imagem';

 ?>