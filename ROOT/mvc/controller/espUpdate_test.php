<?php 
//################# update table set campo = valor where condição = valorCondição
include_once("conection.php");
function espUpdate($table, $field, $value, $cond, $condValue){
		try{
			$sql = "update :table set :field = :value where :cond = :condValue";

			$con = Conexao::getInstance()->prepare($sql);

			$con->bindValue(":table", $table);
			$con->bindValue(":field", $field);
			$con->bindValue(":value", $cond);
			$con->bindValue(":condValue", $condValue);

			$con->execute();
			return "Dado atualizado com sucesso!";
		}
		catch(Exception $e){
			return "Erro ao atualizar ".$table.">".$field."!\nCod: ".$e->getCode()."\nDescrição:".$e->getMessage().".";
		}
	}
?>