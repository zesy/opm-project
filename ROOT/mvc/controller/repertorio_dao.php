<?php

include_once("conection.php");
define('DAO_repert', 'repertorio');
/**
 * 
 */
class RepertorioDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new RepertorioDAO();
  
        return self::$instance;
    }

    function insertRepertorio(Repertorio $var){
    	try {
    		$sql = "insert into ".DAO_repert." ()
    					values()";
			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue("", $var->get());

			$con->execute();
			return $conex->lastInsertId();;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ".DAO_repert."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteRepertorio($id){
		try{
			$sql = "delete from ".DAO_repert." where idRepertorio = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return "".DAO_repert." excluído com sucesso";
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao ".DAO_repert."!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectRepertorio($id){
		try{
			$sql = "select * from ".DAO_repert." where idRepertorio = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Repertorio();

			$var->setId($row['id']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_repert."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateRepertorio(Repertorio $var){
		try{
			$sql = "update ".DAO_repert." set  where idRepertorio = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getId());

			$con->execute();
			return "".DAO_repert." atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_repert."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>