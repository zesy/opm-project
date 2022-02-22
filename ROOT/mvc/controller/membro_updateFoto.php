<?php 
include_once('membro_dao.php');
$membrodao = new MembroDAO();
$imagem = $_POST['dado'];
$id_user = $_POST['id'];

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
$nome = 'user_'.$id_user.'.jpg';

// Salvando imagem em disco
$send = file_put_contents($_SERVER['DOCUMENT_ROOT']."/img/perfil_users/".$nome, $dados);
if($send != false)
    echo $membrodao->updateMembroFotoByUser($id_user, $nome);
else
    echo 'Falha ao gravar imagem';

 ?>