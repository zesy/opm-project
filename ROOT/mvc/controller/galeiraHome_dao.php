<?php

include_once("conection.php");
define('DAO_ghome', 'galeriaHome');
/**
 * 
 */
class GaleriaHomeDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new GaleriaHomeDAO();
  
        return self::$instance;
    }

    function insertGaleriaHome(GaleriaHome $var){
    	try {
    		$sql = "insert into ".DAO_ghome." (caminho, ativo)
    					values(:cam, :atv)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":cam", $var->getCaminho());
			$con->bindValue(":atv", $var->getAtivo());

			$con->execute();
			return $conex->lastInsertId();;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ".DAO_ghome."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteGaleriaHome($id){
		try{
			$sql = "delete from ".DAO_ghome." where idFoto = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return "".DAO_ghome." excluído com sucesso";
		}
		catch(Exception $e){
			return "Erro ao excluir ".DAO_ghome."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectGaleriaHome($id){
		try{
			$sql = "select * from ".DAO_ghome." where idFoto = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new GaleriaHome();

			$var->setIdFoto($row['idFoto']);
			$var->setCaminho($row['caminho']);
			$var->setAtivo($row['ativo']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_ghome."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateGaleriaHome(GaleriaHome $var){
		try{
			$sql = "update ".DAO_ghome." set caminho = :cam, ativo = :atv where idFoto = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdFoto());
			$con->bindValue(":cam", $var->getCaminho());
			$con->bindValue(":atv", $var->getAtivo());

			$con->execute();
			return "".DAO_ghome." atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_ghome."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>