<?php 
include_once('membro_dao.php');
$membrodao = new MembroDao();

$id_u = $_POST['id_user'];
$array_instru = isset($_POST['instru']) ? $_POST['instru'] : null;
$imploded_instru = '';
if (!is_null($array_instru)) {
	$imploded_instru = implode(';', $array_instru);
}

//return var_dump($imploded_instru);
echo $membrodao->updateMembroInstruByUser($id_u, $imploded_instru);

 ?>