<?php
/**
 * 
 */
class Cargo
{
	private $idCargo;
	private $nome;
	
	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }

	function __constructor($idCargo, $nome)
	{
		$this->idCargo = $idCargo;
		$this->nome = $nome;
	}

	public function getIdCargo(){return $this->idCargo;}
	public function setIdCargo($idCargo){$this->idCargo = $idCargo;}

	public function getNome(){return $this->nome;}
	public function setNome($nome){$this->nome = $nome;}
}
?>