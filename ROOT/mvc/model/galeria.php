<?php

/**
 * 
 */
class Galeria
{
	
	function __construct(){
        $args = func_get_args();
        $numberOfArgs = func_num_args();
			if($numberOfArgs>0){
	        	if (method_exists($this,$funtion='__constructor')){
	         		call_user_func_array(array($this,$funtion),$args);
	        	}
        	}
 
    }

	function __constructor($idGaleria, $nome)
	{
		$this->idGaleria = $idGaleria;
		$this->nome = $nome;
	}

	private $idGaleria;
	private $nome;

	function setIdGaleria($idGaleria) { $this->idGaleria = $idGaleria; }
	function getIdGaleria() { return $this->idGaleria; }
	
	function setNome($nome) { $this->nome = $nome; }
	function getNome() { return $this->nome; }
}

?>