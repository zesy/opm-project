<?php

include_once("conection.php");
/**
 * 
 */
class MusicaDAO
{
	
	public static $instance;

	function __construct()
	{
		//# code...
	}

	public static function getInstance() {
        if (!isset(self::$instance))
            self::$instance = new MusicaDAO();
  
        return self::$instance;
    }

    function insertMusica(Musica $var){
    	try {
    		$sql = "insert into musica (nome, autor)
    					values(:nome, :autor)";

			$conex = Conexao::getInstance();
			$con = $conex->prepare($sql);
			//$conex->lastInsertId();

			$con->bindValue(":nome", $var->getNome());
			$con->bindValue(":autor", $var->getAutor());

			$con->execute();
			// $conex->lastInsertId();
			return 1;
    		
    	} catch (Exception $e) {
    		return "Erro ao inserir musica!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
    	}
    }

    function deleteMusica($id){
		try{
			$sql = "delete from musica where idMusica = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			if($e->getCode() == 23000)
				return "Há registros com vinculos existentes ao musica!";
			else
				return "Cod: ".$e->getCode()."<br>Descrição:".$e->getMessage().".";
		}
	}

	function selectMusica($id){
		try{
			$sql = "select * from musica where idMusica = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $id);

			$con->execute();

			$row = $con->fetch(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			$var = new Musica();

			$var->setIdMusica($row['idMusica']);
			$var->setNome($row['nome']);
			$var->setAutor($row['autor']);

			return $var;
		}
		catch(Exception $e){
			return "Erro ao selecionar musica!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

	function selectAllMusica(){
		try{
			$sql = "select * from musica order by nome";

			$con = Conexao::getInstance()->prepare($sql);

			$con->execute();

			$row = $con->fetchAll(PDO::FETCH_ASSOC);

			if($row == false){
				return false;
			}

			return $row;
		}
		catch(Exception $e){
			return "Erro ao selecionar musica!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}


	function updateMusica(Musica $var){
		try{
			$sql = "update musica set nome = :nome, autor = :autor where idMusica = :id";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":id", $var->getIdMusica());
			$con->bindValue(":nome", $var->getNome());
			$con->bindValue(":autor", $var->getAutor());

			$con->execute();
			return 1;
		}
		catch(Exception $e){
			return "Erro ao atualizar musica!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}

}

?>