<?php
header('Content-type: text/html; charset=UTF-8');
include('../init.php');
include_once(DIR_RAIZ."/mvc/controller/orquestra_dao.php");
$orqdao = new OrquestraDAO();
$orq = $orqdao->selectOrquestra();
?>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no" />

<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/croppie.css" />

<link href="../css/style-home.css?v=<?php echo filemtime('../css/style-home.css'); ?>" rel="stylesheet" type="text/css">
<link href="../css/style-perfil.css?v=<?php echo filemtime('../css/style-perfil.css'); ?>" rel="stylesheet" type="text/css">

<link href="../css/all.min.css" rel="stylesheet">
<title><?php echo $orq['nome']; ?></title>