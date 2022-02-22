<?php

include_once("conection.php");
define('DAO_ens', 'ensaio');
/**
 * 
 */
class EnsaioDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new EnsaioDAO();
  
        return self::$instance;
    }

    function insertEnsaio(Ensaio $var){
    	try {
    		$sql = "insert into ensaio (dataHora, cidade, local, idVertente, idRepertorio)
    					values(:dh, :ci, :loc, :idv, :idr)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":dh", $var->getDatahora());
			$con->bindValue(":ci", $var->getCidade());
			$con->bindValue(":loc", $var->getLocal());
			$con->bindValue(":idv", $var->getIdVertente());
			$con->bindValue(":idr", $var->getIdRepertorio());

			$con->execute();
			return 1;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ensaio!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function selectAllEnsaio(){
		try{
			$sql = "select ap.*, v.nome as vert from ensaio as ap left join vertente as v on ap.idVertente = v.idVertente where ap.datahora >= NOW() order by ap.datahora asc";

			$con = Conexao::getInstance()->prepare($sql);

			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar ensaio!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

    function deleteEnsaio($id){
		try{
			$sql = "delete from ensaio where idEnsaio = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao ensaio!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectEnsaio($id){
		try{
			$sql = "select * from ensaio where idEnsaio = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Ensaio();

			$var->setIdEnsaio($row['idEnsaio']);
			$var->setDatahora($row['datahora']);
			$var->setCidade($row['cidade']);
			$var->setLocal($row['local']);
			$var->setIdVertente($row['idVertente']);
			$var->setIdRepertorio($row['idRepertorio']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ensaio!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateEnsaio(Ensaio $var){
		try{
			$sql = "update ensaio set datahora = :dh, cidade = :cidade, local = :loc, idVertente = :idv, idRepertorio = :idr where idEnsaio = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdEnsaio());

			$con->bindValue(":dh", $var->getDatahora());
			$con->bindValue(":cidade", $var->getCidade());
			$con->bindValue(":loc", $var->getLocal());
			$con->bindValue(":idv", $var->getIdVertente());
			$con->bindValue(":idr", $var->getIdRepertorio());

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar ensaio!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>