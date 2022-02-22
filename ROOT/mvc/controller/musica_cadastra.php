<?php 
include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/musica.php');
include_once('musica_dao.php');

$musdao = new MusicaDAO();

$music = new Musica();
$music->setNome($_POST['addMusica']);
$music->setAutor($_POST['addAutor']);

echo $musdao->insertMusica($music);


 ?>