<?php

include_once("conection.php");
define('DAO_carg', 'cargo');
/**
 * 
 */
class CargoDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new CargoDAO();
  
        return self::$instance;
    }

    function insertCargo(Cargo $var){
    	try {
    		$sql = "insert into ".DAO_carg." (nome)
    					values(:nome)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":nome", $var->getNome());

			$con->execute();
			return 1;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ".DAO_carg."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteCargo($id){
		try{
			$sql = "delete from ".DAO_carg." where idCargo = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao ".DAO_carg."!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectCargo($id){
		try{
			$sql = "select * from ".DAO_carg." where idCargo = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Cargo();

			$var->setIdCargo($row['idCargo']);
			$var->setNome($row['nome']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_carg."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectCargoRow($id){
		try{
			$sql = "select * from ".DAO_carg." where idCargo = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_carg."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectAllCargo(){
		try{
			$sql = "select * from ".DAO_carg;

			$con = Conexao::getInstance()->prepare($sql);

			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_carg."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateCargo(Cargo $var){
		try{
			$sql = "update ".DAO_carg." set nome = :nome where idCargo = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdCargo());
			$con->bindValue(":nome", $var->getNome());

			$con->execute();
			return "".DAO_carg." atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_carg."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>