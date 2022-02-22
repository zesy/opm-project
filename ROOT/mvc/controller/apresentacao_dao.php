<?php

include_once("conection.php");
/**
 * 
 */
class ApresentacaoDAO
{
	
	public static $instance;

	// function __construct()
	// {
	// 	//# code...
	// }

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new ApresentacaoDAO();
  
        return self::$instance;
    }

    function insertApresentacao(Apresentacao $var){
    	try {
    		$sql = "insert into apresentacao (datahora, cidade, estado, endereco, numero, local, idVertente, idRepertorio)
    					values(:dt, :ci, :uf, :end, :num, :loc, :idv, :idr)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":dt", $var->getDatahora());
			$con->bindValue(":ci", $var->getCidade());
			$con->bindValue(":uf", $var->getEstado());
			$con->bindValue(":end", $var->getEndereco());
			$con->bindValue(":num", $var->getNumero());
			$con->bindValue(":loc", $var->getLocal());
			$con->bindValue(":idv", $var->getIdVertente());
			$con->bindValue(":idr", $var->getIdRepertorio());

			$con->execute();
			return 1;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir apresentação!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteApresentacao($id){
		try{
			$sql = "delete from apresentacao where idApresentacao = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes à apresentação!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectApresentacao($id){
		try{
			$sql = "select * from apresentacao where idApresentacao = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Apresentacao();

			$var->setId($row['idApresentacao']);
			$var->setDatahora($row['datahora']);
			$var->setCidade($row['cidade']);
			$var->setEstado($row['estado']);
			$var->setEndereco($row['endereco']);
			$var->setNumero($row['numero']);
			$var->setLocal($row['local']);
			$var->setIdVertente($row['idVertente']);
			$var->setIdRepertorio($row['idRepertorio']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar apresentação!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectAllApresentacao(){
		try{
			$sql = "select ap.*, v.nome as vert from apresentacao as ap left join vertente as v on ap.idVertente = v.idVertente where ap.datahora >= NOW() order by ap.datahora asc";

			$con = Conexao::getInstance()->prepare($sql);

			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar apresentação!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateApresentacao(Apresentacao $var){
		try{
			$sql = "update apresentacao set datahora = :dh, cidade = :ci, estado = :uf, endereco = :end, numero = :num, local = :loc, idVertente = :idv, idRepertorio = :idr where idApresentacao = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdApresentacao());
			$con->bindValue(":dh", $var->getDatahora());
			$con->bindValue(":ci", $var->getCidade());
			$con->bindValue(":uf", $var->getEstado());
			$con->bindValue(":end", $var->getEndereco());
			$con->bindValue(":num", $var->geNumero());
			$con->bindValue(":loc", $var->getLocal());
			$con->bindValue(":idv", $var->getIdVertente());
			$con->bindValue(":idr", $var->getIdRepertorio());

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar apresentação!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>