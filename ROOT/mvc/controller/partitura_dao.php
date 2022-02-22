<?php

include_once("conection.php");
define('DAO_part', 'partitura');
/**
 * 
 */
class PartituraDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new PartituraDAO();
  
        return self::$instance;
    }

    function insertPartitura(Partitura $var){
    	try {
    		$sql = "insert into ".DAO_part." (idMusica, idInstrumento, caminho, idUsuario)
    					values(:nm, :id, :cam, :idu)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":nm", $var->getIdMusica());
			$con->bindValue(":id", $var->getIdInstrumento());
			$con->bindValue(":cam", $var->getCaminho());
			$con->bindValue(":idu", $var->getIdUser());

			$con->execute();
			return 1;//$conex->lastInsertId();
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ".DAO_part."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deletePartitura($id){
		$dir = '';
		try{
			$sqls = "select * from ".DAO_part." where idPartitura = :id";

			$cons = Conexao::getInstance()->prepare($sqls);
			$cons->bindValue(":id", $id);
			$cons->execute();

			$rows = $cons->fetch(PDO::FETCH_ASSOC);

			if($rows == false){
				return false;
			}
			$dir = $rows['caminho'];
		}
		catch(Exception $e){
			return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
		try{
			$sql = "delete from ".DAO_part." where idPartitura = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			if(unlink('../../partituras/'.$dir))
				return 1;
			else
			return "Registro Excluído do sistema.<br>Erro ao excluir arquivo do diretório";
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao ".DAO_part."!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectPartitura($id){
		try{
			$sql = "select * from ".DAO_part." where idPartitura = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Partitura();

			$var->setIdPartitura($row['idPartitura']);
			$var->setIdMusica($row['idMusica']);
			$var->setIdInstrumento($row['idInstrumento']);
			$var->setCaminho($row['caminho']);
			$var->setIdUser($row['idUsuario']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_part."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectAllPartitura(){
		try{
			$sql = "select * from partitura";

			$con = Conexao::getInstance()->prepare($sql);


			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_part."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updatePartitura(Partitura $var){
		try{
			$sql = "update ".DAO_part." set idMusica = :nm, idInstrumento = :idi, caminho = :cam, idUsuario = :idu where idPartitura = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdPartitura());
			$con->bindValue(":nm", $var->getIdMusica());
			$con->bindValue(":idi", $var->getIdInstrumento());
			$con->bindValue(":cam", $var->getCaminho());
			$con->bindValue(":idu", $var->getIdUser());

			$con->execute();
			return "".DAO_part." atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_part."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>