<?php
include_once("conection.php");
include_once($_SERVER['DOCUMENT_ROOT'].'/mvc/model/vertente.php');

/**
 * 
 */
class VertenteDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new VertenteDAO();
  
        return self::$instance;
    }

    function insertVertente(Vertente $vert){
    	try {
    		$sql = "insert into vertente (nome, descricao, descPqn, preco, foto, ativo)
    							values(:nome, :desc, :descp, :preco, :foto, :atv)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":nome", $vert->getNome());
			$con->bindValue(":desc", $vert->getDescricao());
			$con->bindValue(":descp", $vert->getDescPqn());
			$con->bindValue(":preco", $vert->getPreco());
			$con->bindValue(":foto", $vert->getFoto());
			$con->bindValue(":atv", $vert->getAtivo());

			$con->execute();
			return 1;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir Vertente!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteVertente($id){
		try{
			$sql = "delete from vertente where idVertente = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes à vertente!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectVertente($id){
		try{
			$sql = "select * from vertente where idVertente = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$vert = new Vertente();

			$vert->setIdVertente($row['idVertente']);
			$vert->setNome($row['nome']);
			$vert->setDescricao($row['descricao']);
			$vert->setDescPqn($row['descPqn']);
			$vert->setPreco($row['preco']);
			$vert->setFoto($row['foto']);
			$vert->setAtivo($row['ativo']);

			return $vert;
		}
		catch(Exception $e){
			return "Erro ao selecionar Vertente!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectAllVertente(){
		try{
			$sql = "select * from vertente";

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

	function selectAllAtvVertente(){
		try{
			$sql = "select * from vertente where ativo = 1";

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

	function updateVertente(Vertente $vert){
		try{
			$sql = "update vertente set nome = :nome, descricao = :desc, descPqn = :descp, preco = :preco where idVertente = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $vert->getIdVertente());
			$con->bindValue(":nome", $vert->getNome());
			$con->bindValue(":desc", $vert->getDescricao());
			$con->bindValue(":descp", $vert->getDescPqn());
			$con->bindValue(":preco", $vert->getPreco());

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar Vertente!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function getAtvVert($id){
		try{
			$sql = "select ativo from vertente where idVertente = :id";
			
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
			return "Erro ao selecionar vertente!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateAtvVert($id, $var){
		try{
			$sql = "update vertente set ativo = :no where idVertente = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->bindValue(":no", $var);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar vertente!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateVertFoto($id, $var){
		try{
			$sql = "update vertente set foto = :var where idVertente = :id";
			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->bindValue(":var", $var);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar Foto!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	//************FIM

}

?>