<?php

include_once("conection.php");

/**
 * 
 */
class SocialDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new SocialDAO();
  
        return self::$instance;
    }

    function insertSocial(Social $soc){
    	try {
    		$sql = "insert into social (facebook, fbAtivo, instagram, instaAtivo, twitter, twitAtivo, youtube, ytAtivo)
    					values(:fb, :fba, :insta, :instaa, :tt, :tta, :yt, :yta)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":fb", $soc->getFacebook());
			$con->bindValue(":fba", $soc->getFbAtivo());
			$con->bindValue(":insta", $soc->getInstagram());
			$con->bindValue(":instaa", $soc->getInstaAtivo());
			$con->bindValue(":tt", $soc->getTwitter());
			$con->bindValue(":tta", $soc->getTwitAtivo());
			$con->bindValue(":yt", $soc->getYouTube());
			$con->bindValue(":yta", $soc->getYtAtivo());

			$con->execute();
			return $conex->lastInsertId();
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir Social!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }
    function insertEmptySocial(){
    	try {
    		$sql = "insert into social (facebook, fbAtivo, instagram, instaAtivo, twitter, twitAtivo, youtube, ytAtivo)
    					values(:fb, :fba, :insta, :instaa, :tt, :tta, :yt, :yta)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":fb", "");
			$con->bindValue(":fba", 0);
			$con->bindValue(":insta", "");
			$con->bindValue(":instaa", 0);
			$con->bindValue(":tt", "");
			$con->bindValue(":tta", 0);
			$con->bindValue(":yt", "");
			$con->bindValue(":yta", 0);

			$con->execute();
			return $conex->lastInsertId();;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir Social!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteSocial($id){
		try{
			$sql = "delete from social where idSocial = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return "Social excluído com sucesso";
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao link de rede social!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectSocial($id){
		try{
			$sql = "select * from social where idSocial = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$soc = new Social();

			$soc->setIdSocial($row['idSocial']);
			$soc->setFacebook($row['facebook']);
			$soc->setFbAtivo($row['fbAtivo']);
			$soc->setInstagram($row['instagram']);
			$soc->setInstaAtivo($row['instaAtivo']);
			$soc->setTwitter($row['twitter']);
			$soc->setTwitAtivo($row['twitAtivo']);
			$soc->setYoutube($row['youtube']);
			$soc->setYtAtivo($row['ytAtivo']);

			return $soc;
		}
		catch(Exception $e){
			return "Erro ao selecionar Social!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateSocial(Social $soc){
		try{
			$sql = "update social set facebook = :fb, fbAtivo = :fba, instagram = :i, instaAtivo = :ia, twitter = :tt, twitAtivo = :tta, youtube = :yt, ytAtivo = :yta where idSocial = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $soc->getIdSocial());
			$con->bindValue(":fb", $soc->getFacebook());
			$con->bindValue(":fba", $soc->getFbAtivo());
			$con->bindValue(":i", $soc->getInstagram());
			$con->bindValue(":ia", $soc->getInstaAtivo());
			$con->bindValue(":tt", $soc->getTwitter());
			$con->bindValue(":tta", $soc->getTwitAtivo());
			$con->bindValue(":yt", $soc->getYouTube());
			$con->bindValue(":yta", $soc->getYtAtivo());

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar Social!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>