<?php
/**
 * 
 */
include_once("conection.php");
class UserDAO
{

	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new UserDAO();
  
        return self::$instance;
    }

	function insertUser(User $user){
		try{
			$sql = "insert into usuario (user, senha, nivelAcesso, ativo)
			values (:usuario, :pass, :nacesso, :atv)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);

			$con->bindValue(":usuario", $user->getUser());
			$con->bindValue(":pass", $user->getPass());
			$con->bindValue(":nacesso", $user->getNaccess());
			$con->bindValue(":atv", $user->getAtivo());

			$con->execute();
			
			return $conex->lastInsertId();
		}
		catch(PDOException $e){
			return "Erro ao inserir Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function deleteUser(User $user){
		try{
			$sql = "delete from usuario where user = :user and senha = :pass";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":user", $user->getUser());
			$con->bindValue(":pass", $user->getPass());

			$con->execute();
			return "Usuário excluído com sucesso";
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao usuário!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function deleteUserById($id){
		try{
			$sql = "delete from usuario where idUsuario = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return "Usuário excluído com sucesso";
		}
		catch(Exception $e){
			return "Erro ao excluir Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectUser($u){
		try{
			$sql = "select * from usuario where user = :usuario";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":usuario", $u);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			//include("mvc/model/user.php");

			$user = new User();

			$user->setId($row['idUsuario']);
			$user->setUser($row['user']);
			$user->setPass($row['senha']);
			$user->setNaccess($row['nivelAcesso']);
			$user->setAtivo($row['ativo']);

			return $user;
		}
		catch(Exception $e){
			return "Erro ao selecionar Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectUserById($id){
		try{
			$sql = "select * from usuario where idUsuario = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			//include("mvc/model/user.php");

			$user = new User();

			$user->setId($row['idUsuario']);
			$user->setUser($row['user']);
			$user->setPass($row['senha']);
			$user->setNaccess($row['nivelAcesso']);
			$user->setAtivo($row['ativo']);

			return $user;
		}
		catch(Exception $e){
			return "Erro ao selecionar Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function verifExistUser($u){
		$num = (int) 0;
		$user = $u;
		$continue = UserDAO::selectExistUser($user);
		while ($continue) {
			$num++;
			$continue = UserDAO::selectExistUser($user."".$num);
		}
		return $num;
	}

	function selectExistUser($u){
		try{
			$sql = "select user from usuario where user = :u";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":u", $u);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return true;
		}
		catch(Exception $e){
			return "Erro ao selecionar Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateUser(User $user){
		try{
			$sql = "update usuario set user = :user, senha = :pass,  nivelAcesso = :nacc where user = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $user->getId());
			$con->bindValue(":user", $user->getUser());
			$con->bindValue(":pass", $user->getPass());
			$con->bindValue(":nacc", $user->getNaccess());

			$con->execute();
			return "Usuário atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}


	function updateUserPass($id, $p){
		try{
			$sql = "update usuario set senha = :pass where idUsuario = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);
			$con->bindValue(":pass", $p);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function updateUserAtivo(User $user){
		try{
			$sql = "update usuario set ativo = :atv where user = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $user->getId());
			$con->bindValue(":atv", $user->getAtivo());

			$con->execute();
			return "Usuário atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar Usuário!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}
}
?>