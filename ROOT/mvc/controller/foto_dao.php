<?php

include_once("conection.php");
define('DAO_fot', 'foto');
/**
 * 
 */
class FotoDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new FotoDAO();
  
        return self::$instance;
    }

    function insertFoto(Foto $var){
    	try {
    		$sql = "insert into ".DAO_fot." (caminho, idGaleira)
    					values(:c, :idg)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":c", $var->getCaminho());
			$con->bindValue(":idg", $var->getIdGaleria());

			$con->execute();
			return 1;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ".DAO_fot."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteFoto($id){
		try{
			$sql = "delete from ".DAO_fot." where idFoto = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return "".DAO_fot." excluído com sucesso";
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao ".DAO_fot."!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectFoto($id){
		try{
			$sql = "select * from ".DAO_fot." where idFoto = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Foto();

			$var->setIdFoto($row['idFoto']);
			$var->setCaminho($row['caminho']);
			$var->setIdGaleria($row['idGaleria']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_fot."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateFoto(Foto $var){
		try{
			$sql = "update ".DAO_fot." set caminho = :c, idGaleira = :idg where idFoto = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdFoto());
			$con->bindValue(":c", $var->getCaminho());
			$con->bindValue(":idg", $var->getIdGaleria());

			$con->execute();
			return "".DAO_fot." atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_fot."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>