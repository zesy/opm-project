<?php 
include_once("conection.php");

$fb = isset($_POST['linkfb']) ? $_POST['linkfb'] : '';
$fba = isset($_POST['checkfb']) ? 1 : 0;
$in = isset($_POST['linkinsta']) ? $_POST['linkinsta'] : '';
$ina = isset($_POST['checkinsta']) ? 1 : 0;
$tw = isset($_POST['linktwit']) ? $_POST['linktwit'] : '';
$twa = isset($_POST['checktwit']) ? 1 : 0;
$yt = isset($_POST['linkyt']) ? $_POST['linkyt'] : '';
$yta = isset($_POST['checkyt']) ? 1 : 0;


	try{
		$sql = "update social set facebook = :fb, fbAtivo = :fba, instagram = :in, instaAtivo = :ina, twitter = :tw, twitAtivo = :twa, youtube = :yt, ytAtivo = :yta where idSocial = 1";

		$con = Conexao::getInstance()->prepare($sql);

		$con->bindValue(":fb", $fb);
		$con->bindValue(":fba", $fba);
		$con->bindValue(":in", $in);
		$con->bindValue(":ina", $ina);
		$con->bindValue(":tw", $tw);
		$con->bindValue(":twa", $twa);
		$con->bindValue(":yt", $yt);
		$con->bindValue(":yta", $yta);

		$con->execute();
		echo 1;
	}
	catch(Exception $e){
		echo "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
	}

 ?>