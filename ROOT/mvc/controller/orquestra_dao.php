<?php

include_once("conection.php");
/**
 * 
 */
class OrquestraDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new OrquestraDAO();
  
        return self::$instance;
    }


	function selectOrquestra(){
		try{
			$sql = "select * from orquestra";

			$con = Conexao::getInstance()->prepare($sql);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar orquestra!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}


	function updateOrquestra($nome, $hist){
		try{
			$sql = "update orquestra set nome = :nome, historia = :hist";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":nome", $nome);
			$con->bindValue(":hist", $hist);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar orquestra!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}


	function updateSmtp($smtp, $port, $user, $pass, $ssl){
		try{
			$sql = "update orquestra set smtp = :smtp, port = :port, email = :user, senha = :pass, assl = :ssl";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":smtp", $smtp);
			$con->bindValue(":port", $port);
			$con->bindValue(":user", $user);
			$con->bindValue(":pass", $pass);
			$con->bindValue(":ssl", $ssl);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar orquestra!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>