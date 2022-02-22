<?php

include_once("conection.php");

/**
 * 
 */
class MembroDAO
{

	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new MembroDAO();
  
        return self::$instance;
    }

    function insertMembro(Membro $membro){
    	try{
			$sql = "insert into membro (nome, sobrenome, email, tel, cidade, logradouro, bairro, numero, cep, estado, idCargo, idUsuario, idSocial, idInstrumento, idVertente, fotoPerfil, freelancer, visivel, nivelAfinidade, ativo)
			values (:nome, :sobrenome, :email, :tel, :cidade, :logradouro, :bairro, :numero, :cep, :estado, :idCargo, :idUsuario, :idSocial, :idInstrumento, :idVertente, :fotoPerfil, :freelancer, :visivel, :nivelAfinidade, :atv)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":nome", $membro->getNome());
			$con->bindValue(":sobrenome", $membro->getSnome());
			$con->bindValue(":email", $membro->getEmail());
			$con->bindValue(":tel", $membro->getTel());
			$con->bindValue(":cidade", $membro->getcidade());
			$con->bindValue(":logradouro", $membro->getLogradouro());
			$con->bindValue(":bairro", $membro->getBairro());
			$con->bindValue(":numero", $membro->getNumero());
			$con->bindValue(":cep", $membro->getCep());
			$con->bindValue(":estado", $membro->getEstado());
			$con->bindValue(":idCargo", $membro->getIdCargo());
			$con->bindValue(":idUsuario", $membro->getIdUser());
			$con->bindValue(":idSocial", $membro->getIdSocial());
			$con->bindValue(":idInstrumento", $membro->getIdInstrumento());
			$con->bindValue(":idVertente", $membro->getIdVertente());
			$con->bindValue(":fotoPerfil", $membro->getFotoPerfil());

			$con->bindValue(":freelancer", $membro->getFreelancer());
			$con->bindValue(":visivel", $membro->getVisivel());
			$con->bindValue(":nivelAfinidade", $membro->getNivelAfinidade());

			$con->bindValue(":atv", $membro->getAtivo());

			$con->execute();
			return $conex->lastInsertId();;
		}
		catch(Exception $e){
			return "Erro ao inserir Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
    }

    function deleteMembro(Membro $m){
		try{
			$sql = "delete from membro where idMembro = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $m->getId());

			$con->execute();
			return "Membro excluído com sucesso";
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao membro!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}
	function deleteMembroById($id){
		try{
			$sql = "delete m, u from membro as m inner join usuario as u on (m.idUsuario = u.idUsuario) where m.idMembro = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao excluir Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectMembroByUser($idu){
		try{
			$sql = "select * from membro where idUsuario = :idu";
			
			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":idu", $idu);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			//include("mvc/model/user.php");

			$membro = new Membro();

			$membro->setId($row['idMembro']);
			$membro->setNome($row['nome']);
			$membro->setSnome($row['sobrenome']);
			$membro->setEmail($row['email']);
			$membro->setTel($row['tel']);
			$membro->setCidade($row['cidade']);
			$membro->setLogradouro($row['logradouro']);
			$membro->setBairro($row['bairro']);
			$membro->setNumero($row['numero']);
			$membro->setCep($row['cep']);
			$membro->setEstado($row['estado']);
			$membro->setIdCargo($row['idCargo']);
			$membro->setIdUser($row['idUsuario']);
			$membro->setIdSocial($row['idSocial']);
			$membro->setIdInstrumento($row['idInstrumento']);
			$membro->setIdVertente($row['idVertente']);
			$membro->setFotoPerfil($row['fotoPerfil']);
			$membro->setFreelancer($row['freelancer']);
			$membro->setVisivel($row['visivel']);
			$membro->setNivelAfinidade($row['nivelAfinidade']);

			$membro->setAtivo($row['ativo']);

			return $membro;
		}
		catch(Exception $e){
			return "Erro ao selecionar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectMembroById($id){
		try{
			$sql = "select * from membro where idMembro = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			//include("mvc/model/user.php");

			$membro = new Membro();

			$membro->setId($row['idMembro']);
			$membro->setNome($row['nome']);
			$membro->setSnome($row['sobrenome']);
			$membro->setEmail($row['email']);
			$membro->setTel($row['tel']);
			$membro->setCidade($row['cidade']);
			$membro->setLogradouro($row['logradouro']);
			$membro->setBairro($row['bairro']);
			$membro->setNumero($row['numero']);
			$membro->setCep($row['cep']);
			$membro->setEstado($row['estado']);
			$membro->setIdCargo($row['idCargo']);
			$membro->setIdUser($row['idUsuario']);
			$membro->setIdSocial($row['idSocial']);
			$membro->setIdInstrumento($row['idInstrumento']);
			$membro->setIdVertente($row['idVertente']);
			$membro->setFotoPerfil($row['fotoPerfil']);
			$membro->setFreelancer($row['freelancer']);
			$membro->setVisivel($row['visivel']);
			$membro->setNivelAfinidade($row['nivelAfinidade']);

			$membro->setAtivo($row['ativo']);

			return $membro;
		}
		catch(Exception $e){
			return "Erro ao selecionar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectMembroNome($idu){
		try{
			$sql = "select nome from membro where idUsuario = :idu";
			
			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":idu", $idu);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row["nome"];
		}
		catch(Exception $e){
			return "Erro ao selecionar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}
	function selectAllMembro($where){
		try{
			$sql = "select * from membro".$where;
			
			$con = Conexao::getInstance()->prepare($sql);

			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateMembro(Membro $membro){
		try{
			$sql = "update membro set nome = :nome, sobrenome = :snome, email = :email, tel = :tel, cidade = :cidade, logradouro = :log, bairro = :bairro, numero = :num, cep = :cep, estado = :uf, idCargo = :idcargo, idUsuario = :iduser, idInstrumento = :idinstru, idVertente = :idvert, visivel = :visiv where idMembro = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $membro->getId());
			$con->bindValue(":nome", $membro->getNome());
			$con->bindValue(":snome", $membro->getSnome());
			$con->bindValue(":email", $membro->getEmail());
			$con->bindValue(":tel", $membro->getTel());
			$con->bindValue(":cidade", $membro->getCidade());
			$con->bindValue(":log", $membro->getLogradouro());
			$con->bindValue(":bairro", $membro->getBairro());
			$con->bindValue(":num", $membro->getNumero());
			$con->bindValue(":cep", $membro->getCep());
			$con->bindValue(":uf", $membro->getEstado());
			$con->bindValue(":idcargo", $membro->getIdCargo());
			$con->bindValue(":iduser", $membro->getIdUser());
			$con->bindValue(":idinstru", $membro->getIdInstrumento());
			$con->bindValue(":idvert", $membro->getIdVertente());
			$con->bindValue(":visiv", $membro->getVisivel());

			$con->execute();
			return true;
		}
		catch(Exception $e){
			return "Erro ao atualizar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateMembro_me(Membro $membro){
		try{
			$sql = "update membro set nome = :nome, sobrenome = :snome, email = :email, tel = :tel, cidade = :cidade, logradouro = :log, bairro = :bairro, numero = :num, cep = :cep, estado = :uf, idCargo = :cargo, nivelAfinidade = :nafi, idVertente = :vert, visivel = :visiv where idMembro = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $membro->getId());
			$con->bindValue(":nome", $membro->getNome());
			$con->bindValue(":snome", $membro->getSnome());
			$con->bindValue(":email", $membro->getEmail());
			$con->bindValue(":tel", $membro->getTel());
			$con->bindValue(":cidade", $membro->getCidade());
			$con->bindValue(":log", $membro->getLogradouro());
			$con->bindValue(":bairro", $membro->getBairro());
			$con->bindValue(":num", $membro->getNumero());
			$con->bindValue(":cep", $membro->getCep());
			$con->bindValue(":uf", $membro->getEstado());
			$con->bindValue(":visiv", $membro->getVisivel());
			$con->bindValue(":vert", $membro->getIdVertente());
			$con->bindValue(":cargo", $membro->getIdCargo());
			$con->bindValue(":nafi", $membro->getNivelAfinidade());

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateMembro_field($id, $field, $value){
		try{
			$sql = "update membro set ".$field." = :idu, where idMembro = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->bindValue(":idu", $value);

			$con->execute();
			return true;
		}
		catch(Exception $e){
			return "Erro ao atualizar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function getAtvMembro($id){
		try{
			$sql = "select ativo from membro where idMembro = :id";

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
			return "Erro ao selecionar membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateAtvMembro($id, $var){
		try{
			$sql = "update membro as m inner join usuario as u on (m.idUsuario = u.idUsuario) set m.ativo = :no, u.ativo = :no where m.idMembro = :id";


			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->bindValue(":no", $var);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateMembroFotoByUser($id, $var){
		try{
			$sql = "update membro set fotoPerfil = :var where idUsuario = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->bindValue(":var", $var);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectMembroFotoByUser($id){
		try{
			$sql = "select fotoPerfil from membro where idUsuario = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}
			return $row['fotoPerfil'];
		}
		catch(Exception $e){
			return "Erro ao atualizar Foto!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateMembroInstruByUser($id_u, $var){
		try{
			$sql = "update membro set idInstrumento = :var where idUsuario = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id_u);
			$con->bindValue(":var", $var);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectInstruMembroByUser($id){
		try{
			$sql = "select idInstrumento from membro where idUsuario = :id and idInstrumento is not null";
			
			$con = Conexao::getInstance()->prepare($sql);
			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectInstruMembroById($id){
		try{
			$sql = "select idInstrumento from membro where idMembro = :id";
			
			$con = Conexao::getInstance()->prepare($sql);
			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row['idInstrumento'];
		}
		catch(Exception $e){
			return "Erro ao selecionar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectVertMembroByUser($id){
		try{
			$sql = "select idVertente from membro where idUsuario = :id and idVertente is not null";
			
			$con = Conexao::getInstance()->prepare($sql);
			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row["idVertente"];
		}
		catch(Exception $e){
			return "Erro ao selecionar Membro!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}


?>