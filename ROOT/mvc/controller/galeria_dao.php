<?php

include_once("conection.php");
define('DAO_gale', 'galeria');
/**
 * 
 */
class GaleriaDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new GaleriaDAO();
  
        return self::$instance;
    }

    function insertGaleria(Galeria $var){
    	try {
    		$sql = "insert into ".DAO_gale." (nome)
    					values(:n)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":n", $var->geNome());

			$con->execute();
			return $conex->lastInsertId();;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ".DAO_gale."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteGaleria($id){
		try{
			$sql = "delete from ".DAO_gale." where idGaleria = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return "".DAO_gale." excluído com sucesso";
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao ".DAO_gale."!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectGaleria($id){
		try{
			$sql = "select * from ".DAO_gale." where idGaleria = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Galeria();

			$var->setIdGaleria($row['idGaleria']);
			$var->setNome($row['nome']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_gale."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateGaleria(Galeria $var){
		try{
			$sql = "update ".DAO_gale." set nome = :n where idGaleria = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getId());
			$con->bindValue(":n", $var->getNome());

			$con->execute();
			return "".DAO_gale." atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_gale."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>