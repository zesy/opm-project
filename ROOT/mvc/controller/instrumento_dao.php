<?php

include_once("conection.php");
include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/instrumento.php');
define('DAO_instru', 'instrumento');
/**
 * 
 */
class InstrumentoDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new InstrumentoDAO();
  
        return self::$instance;
    }

    function insertInstrumento(Instrumento $var){
    	try {
    		$sql = "insert into ".DAO_instru." (nome, naipe, ativo, icone, nomeExibicao)
    				values(:no, :na, :atv, :ico, :ne)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":no", $var->getNome());
			$con->bindValue(":na", $var->getNaipe());
			$con->bindValue(":atv", $var->getAtivo());
			$con->bindValue(":ico", $var->getIcone());
			$con->bindValue(":ne", $var->getNomeExibicao());

			$con->execute();
			return 1;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteInstrumento($id){
		try{
			$sql = "delete from ".DAO_instru." where idInstrumento = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao ".DAO_instru."!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectInstrumento($id){
		try{
			$sql = "select * from ".DAO_instru." where idInstrumento = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Instrumento();

			$var->setIdInstrumento($row['idInstrumento']);
			$var->setNome($row['nome']);
			$var->setNaipe($row['naipe']);
			$var->setAtivo($row['ativo']);
			$var->setIcone($row['icone']);
			$var->setNomeExibicao($row['nomeExibicao']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectInstrumentoAtv($id){
		try{
			$sql = "select * from ".DAO_instru." where idInstrumento = :id and ativo = 1";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Instrumento();

			$var->setIdInstrumento($row['idInstrumento']);
			$var->setNome($row['nome']);
			$var->setNaipe($row['naipe']);
			$var->setAtivo($row['ativo']);
			$var->setIcone($row['icone']);
			$var->setNomeExibicao($row['nomeExibicao']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectAllInstrumento(){
		try{
			$sql = "select * from ".DAO_instru;

			$con = Conexao::getInstance()->prepare($sql);


			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectAllInstrumentoAtv(){
		try{
			$sql = "select * from ".DAO_instru." where ativo = 1";

			$con = Conexao::getInstance()->prepare($sql);


			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateInstrumento(Instrumento $var){
		try{
			$sql = "update ".DAO_instru." set nome = :no, naipe = :na, ativo = :atv, icone = :ico, nomeExibicao = :ne where idInstrumento = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdInstrumento());
			$con->bindValue(":no", $var->getnome());
			$con->bindValue(":na", $var->getNaipe());
			$con->bindValue(":atv", $var->getAtivo());
			$con->bindValue(":ico", $var->getIcone());
			$con->bindValue(":ne", $var->getNomeExibicao());

			$con->execute();
			return "".DAO_instru." atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function getAtvInstru($id){
		try{
			$sql = "select ativo from ".DAO_instru." where idInstrumento = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}
			return $row['ativo'];
		}
		catch(Exception $e){
			return "Erro ao selecionar ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateAtvInstru($id, $var){
		try{
			$sql = "update ".DAO_instru." set ativo = :no where idInstrumento = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->bindValue(":no", $var);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar ".DAO_instru."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>