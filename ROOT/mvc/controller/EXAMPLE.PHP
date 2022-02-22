<?php

include_once("conection.php");
/**
 * 
 */
class crassDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new CRASSDAO();
  
        return self::$instance;
    }

    function insertCRASS(CRASS $var){
    	try {
    		$sql = "insert into TABLE ()
    					values()";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue("", $var->get());

			$con->execute();
			return $conex->lastInsertId();;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir TABLE!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteCRASS($id){
		try{
			$sql = "delete from TABLE where idCRASS = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return "TABLE excluído com sucesso";
		}
		catch(Exception $e){
			return "Erro ao excluir TABLE!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectCRASS($id){
		try{
			$sql = "select * from TABLE where idCRASS = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new CRASS();

			$var->setId($row['id']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar TABLE!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateCRASS(CRASS $var){
		try{
			$sql = "update TABLE set  where idCRASS = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getId());

			$con->execute();
			return "TABLE atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar TABLE!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>