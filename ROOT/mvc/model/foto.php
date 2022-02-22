<?php

/**
 * 
 */
class Foto
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

	function __constructor($idFoto, $caminho, $idGaleria)
	{
		$this->idFoto = $idFoto;
		$this->caminho = $caminho;
		$this->idGaleria = $idGaleria;
	}

	private $idFoto;
	private $caminho;
	private $idGaleria;

	function setIdFoto($idFoto) { $this->idFoto = $idFoto; }
	function getIdFoto() { return $this->idFoto; }

	function setCaminho($caminho) { $this->caminho = $caminho; }
	function getCaminho() { return $this->caminho; }
	
	function setIdGaleria($idGaleria) { $this->idGaleria = $idGaleria; }
	function getIdGaleria() { return $this->idGaleria; }

}

?>